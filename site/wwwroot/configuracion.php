<?php
require_once 'verificar_sesion.php';
if ($_SESSION['rol'] !== 'Administrador') {
    exit("Acceso no autorizado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Configuración</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
  <h2>⚙️ Configuración</h2>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card border-primary shadow rounded-3">
          <h5 class="card-title">👤 Registrar nuevo usuario</h5>
          <p class="card-text">➕Añadir un nuevo usuario o administrador al sistema.</p>
          <a href="registroper.html" class="text-decoration-none">
          <span class="stretched-link"></span>
        </div>
      </div>
    </a>
  </div>
</div>

</body>
</html>