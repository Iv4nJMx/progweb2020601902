<?php
require_once 'verificar_sesion.php';
if (!in_array($_SESSION['rol'], ['Administrador', 'Empleado'])) {
    exit("Acceso no autorizado.");
}
require_once 'conexionbd.php';
$resultado = $conexion->query("SELECT CodProd, NombreProd, PrecioV, Stock, Activo FROM Productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container mt-4">

    <h2>📦 Inventario</h2>
    <a href="nuevo_prod.php" class="btn btn-success mb-3">➕ Agregar producto</a>
    <table id="tablaInventario" class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $row['CodProd'] ?></td>
                <td><?= $row['NombreProd'] ?></td>
                <td>$<?= $row['PrecioV'] ?></td>
                <td><?= $row['Stock'] ?></td>
                <td><?= $row['Activo'] ? 'Sí' : 'No' ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function () {
    $('#tablaInventario').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
</body>
</html>