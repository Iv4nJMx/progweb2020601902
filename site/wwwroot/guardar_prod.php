<?php
require_once 'verificar_sesion.php';
require_once 'conexionbd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = trim($_POST['codprod']);
    $codigo_barras = trim($_POST['codbarras']);
    $nombre = trim($_POST['nombreprod']);
    $descripcion = trim($_POST['descripcion']);
    $id_categoria = intval($_POST['categoria']);
    $precio_c = floatval($_POST['precioc']);
    $precio_v = floatval($_POST['preciov']);
    $stock = intval($_POST['stock']);
    $stock_min = intval($_POST['stockmin']);
    $activo = intval($_POST['activo']);


    if ($codigo && $codigo_barras && $nombre && $precio_c > 0 && $precio_v > 0 && $stock >= 0) {
        $stmt = $conexion->prepare("INSERT INTO Productos 
            (CodProd, CodigoBarras, NombreProd, Descripcion, ID_Categoria, PrecioC, PrecioV, Stock, StockMin, Activo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiddiii", 
            $codigo, 
            $codigo_barras, 
            $nombre, 
            $descripcion, 
            $id_categoria, 
            $precio_c, 
            $precio_v, 
            $stock, 
            $stock_min, 
            $activo
        );
        
        if ($stmt->execute()) {
            echo "<script>alert('✅ Producto guardado correctamente'); window.location.href='inventario.php';</script>";
        } else {
            echo "<script>alert('❌ Error al guardar producto: " . addslashes($stmt->error) . "'); window.location.href='inventario.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('❌ Datos inválidos.'); window.location.href='inventario.php';</script>";
    }
} else {
    header("Location: inventario.php");
    exit();
}