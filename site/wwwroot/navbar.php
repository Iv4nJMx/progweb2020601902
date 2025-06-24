<?php
// navbar.php
require_once 'verificar_sesion.php'; // Asegura que la sesión esté activa
$rol = $_SESSION['rol']; // Obtiene el rol del usuario
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">🍀"El Trébol" Papelería🍀</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="venta.php">Realizar venta</a></li>
        <li class="nav-item"><a class="nav-link" href="inventario.php">Inventario</a></li>
        <li class="nav-item"><a class="nav-link" href="registro_ventas.php">Registro de ventas</a></li>
        <?php if ($rol === 'Administrador'): ?>
        <li class="nav-item"><a class="nav-link" href="configuracion.php">Configuración</a></li>
        <?php endif; ?>
      </ul>
      <span class="navbar-text me-3 text-white">
        <?php echo htmlspecialchars($_SESSION['usuario']) . " ($rol)"; ?>
      </span>
      <a href="cerrar_sesion.php" class="btn btn-outline-light">Cerrar sesión</a>
    </div>
  </div>
</nav>