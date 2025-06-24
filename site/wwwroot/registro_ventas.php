<?php
require_once 'verificar_sesion.php';
if (!in_array($_SESSION['rol'], ['Administrador', 'Empleado'])) {
    exit("Acceso no autorizado.");
}
require_once 'conexionbd.php';

$sql = "SELECT V.Num_Venta, V.FechaHora, P.NombreProd, DV.Cantidad, V.MetodoPago, DV.Subtotal
        FROM Ventas V
        JOIN Detalle_Ventas DV ON V.Num_Venta = DV.V_Num_Venta
        JOIN Productos P ON DV.P_CodProd = P.CodProd
        ORDER BY V.Num_Venta DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <h2>📄 Registro de Ventas</h2>
    <a href="generar_reportev.php" class="btn btn-danger mb-3">📄 Generar reporte de ventas</a>
    <table id="tablaVentas" class="table table-striped">
        <thead>
            <tr>
                <th>No. Venta</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Tipo de Pago</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $row['Num_Venta'] ?></td>
                <td><?= $row['FechaHora'] ?></td>
                <td><?= $row['NombreProd'] ?></td>
                <td><?= $row['Cantidad'] ?></td>
                <td><?= $row['MetodoPago'] ?></td>
                <td>$<?= $row['Subtotal'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function () {
    $('#tablaVentas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
</body>
</html>