<?php
require_once 'verificar_sesion.php';
require_once 'conexionbd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productos = $_POST['producto']; // Arreglo para códigos de productos
    $cantidades = $_POST['cantidad']; // Arreglo para cantidades
    $tipo_pago = $_POST['tipo_pago']; // Tipo de pago
    $id_usuario = $_SESSION['id_usuario'];

   //Verifica que los campos no esten vacios 
    if (empty($productos) || empty($cantidades) || count($productos) !== count($cantidades)) {
        die("Datos de venta inválidos.");
    }

    $conexion->begin_transaction();

    try {
        // Calculo del total de la venta
        $total_venta = 0;
for ($i = 0; $i < count($productos); $i++) {
    $cod = $conexion->real_escape_string($productos[$i]);
    $cant = intval($cantidades[$i]);

    // Verifica que haya productos
    $stmt_check = $conexion->prepare("SELECT COUNT(*) as existe FROM Productos WHERE CodProd = ?");
    $stmt_check->bind_param("s", $cod);
    $stmt_check->execute();
    $resultado_check = $stmt_check->get_result();
    $row_check = $resultado_check->fetch_assoc();
    
    if ($row_check['existe'] == 0) {
        throw new Exception("Producto no encontrado: $cod");
    }
    
    // Obtencion de precios
    $stmt_precio = $conexion->prepare("SELECT PrecioV FROM Productos WHERE CodProd = ?");
    $stmt_precio->bind_param("s", $cod);
    $stmt_precio->execute();
    $resultado_precio = $stmt_precio->get_result();
    $row_precio = $resultado_precio->fetch_assoc();
    $precio_unitario = $row_precio['PrecioV'];
    
    $subtotal = $precio_unitario * $cant;
    $total_venta += $subtotal;
    $stmt_check->close();
    $stmt_precio->close();
}

        // Insertar la venta con total
        $stmt = $conexion->prepare("INSERT INTO Ventas (ID_Usuario, FechaHora, Total, MetodoPago) VALUES (?, NOW(), ?,?)");
        $stmt->bind_param("ids", $id_usuario, $total_venta,$tipo_pago);
        $stmt->execute();
        $num_venta = $conexion->insert_id;
        $stmt->close();

        // Insertar detalles
        $stmt_detalle = $conexion->prepare(
            "INSERT INTO Detalle_Ventas (V_Num_Venta, P_CodProd, Cantidad, PrecioUnitario, Subtotal) 
             VALUES (?, ?, ?, ?, ?)"
        );

        for ($i = 0; $i < count($productos); $i++) {
            $cod = $conexion->real_escape_string($productos[$i]);
            $cant = intval($cantidades[$i]);

            // Obtener precio unitario 
            $stmt_precio = $conexion->prepare("SELECT PrecioV FROM Productos WHERE CodProd = ?");
            $stmt_precio->bind_param("s", $cod); // Usar "s" o "i" según corresponda
            $stmt_precio->execute();
            $resultado_precio = $stmt_precio->get_result();
            $row_precio = $resultado_precio->fetch_assoc();
            $precio_unitario = $row_precio['PrecioV'];
            $subtotal = $precio_unitario * $cant;
            $stmt_precio->close();

            // Insertar detalle
            $stmt_detalle->bind_param("isidd", $num_venta, $cod, $cant, $precio_unitario, $subtotal);
            if (!$stmt_detalle->execute()) {
                throw new Exception("Error al insertar detalle: " . $stmt_detalle->error);
            }

            // Actualizar stock
            $stmt_stock = $conexion->prepare("UPDATE Productos SET Stock = Stock - ? WHERE CodProd = ?");
            $stmt_stock->bind_param("is", $cant, $cod);
            if (!$stmt_stock->execute()) {
                throw new Exception("Error al actualizar stock: " . $stmt_stock->error);
            }
            $stmt_stock->close();
        }

        $stmt_detalle->close();
        $conexion->commit();

        echo "<script>alert('✅ Venta registrada con éxito.'); window.location.href='registro_ventas.php';</script>";

    } catch (Exception $e) {
        $conexion->rollback();
        die("Error al procesar la venta: " . $e->getMessage());
    }
} else {
    header("Location: realizar_venta.php");
    exit();
}
?>