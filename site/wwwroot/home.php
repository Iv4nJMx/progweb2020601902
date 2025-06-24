<?php
require_once 'verificar_sesion.php';
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EL Trébol</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<?php include 'navbar.php'; ?>

<body class="bg-ligth">
<div class="container mt-5">
  <div class="text-center">
    <h1 class="mb-4">🍀"El Trébol" Papeleria 🍀</h1>
    <p class="mb-4">Panel de <?= $rol === 'Administrador' ? 'Administración' : 'Empleado' ?></p>
  </div>
 <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
  <div class="col">
    <a href="venta.php" class="text-decoration-none">
      <div class="card h-100 text-white bg-primary">
        <div class="card-body text-center">
          <h5 class="card-title">🛒 Realizar venta</h5>
          <p class="card-text">Proceso de Venta</p>
          <span class="stretched-link"></span>
        </div>
      </div>
    </a>
  </div>

  <div class="col">
    <a href="inventario.php" class="text-decoration-none">
      <div class="card h-100 text-white bg-success">
        <div class="card-body text-center">
          <h5 class="card-title">📦 Inventario</h5>
          <p class="card-text">Consultar, agregar o actualizar productos disponibles.</p>
          <span class="stretched-link"></span>
        </div>
      </div>
    </a>
  </div>

  <div class="col">
    <a href="registro_ventas.php" class="text-decoration-none">
      <div class="card h-100 text-white bg-warning">
        <div class="card-body text-center">
          <h5 class="card-title">📄 Registro de ventas</h5>
          <p class="card-text">Revisa el historial de transacciones realizadas.</p>
          <span class="stretched-link"></span>
        </div>
      </div>
    </a>
  </div>

  <?php if ($rol === 'Administrador'): ?>
  <div class="col">
    <a href="configuracion.php" class="text-decoration-none">
      <div class="card h-100 text-white bg-danger">
        <div class="card-body text-center">
          <h5 class="card-title">⚙️ Configuración</h5>
          <p class="card-text">Gestiona usuarios, roles y configuraciones generales.</p>
          <span class="stretched-link"></span>
        </div>
      </div>
    </a>
  </div>
  <?php endif; ?>
</div>