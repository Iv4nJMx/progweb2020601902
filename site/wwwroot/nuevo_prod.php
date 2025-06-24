<?php
require_once 'verificar_sesion.php';
require_once 'conexionbd.php';
if (!in_array($_SESSION['rol'], ['Administrador', 'Empleado'])) {
    exit("Acceso no autorizado.");
}

// Obtener categorías para el select
$categorias = $conexion->query("SELECT ID_Categoria, NombreCat FROM Categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
  <h2>➕ Agregar Producto</h2>
  <form action="guardar_prod.php" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="codprod" class="form-label">Código del Producto</label>
      <input type="text" name="codprod" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="codigo_barras" class="form-label">Código de Barras</label>
      <input type="text" name="codbarras" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="nombreprod" class="form-label">Nombre del Producto</label>
      <input type="text" name="nombreprod" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" name="descripcion" class="form-control" maxlength="100">
    </div>
    <div class="mb-3">
      <label for="categoria" class="form-label">Categoría</label>
      <select name="categoria" class="form-select" required>
        <option value="">-- Selecciona una categoría --</option>
        <?php while ($cat = $categorias->fetch_assoc()): ?>
          <option value="<?= $cat['ID_Categoria'] ?>"><?= $cat['NombreCat'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="precioc" class="form-label">Precio de Compra</label>
      <input type="number" name="precioc" class="form-control" step="0.01" min="0.01" required>
    </div>
    <div class="mb-3">
      <label for="preciov" class="form-label">Precio de Venta</label>
      <input type="number" name="preciov" class="form-control" step="0.01" min="0.01" required>
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control" min="0" required>
    </div>
    <div class="mb-3">
      <label for="stockmin" class="form-label">Stock Mínimo</label>
      <input type="number" name="stockmin" class="form-control" min="0">
    </div>
    <div class="mb-3">
      <label for="activo" class="form-label">Disponible</label>
      <select name="activo" class="form-select" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="inventario.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
<script src="validar_producto.js"></script>
</body>
</html>