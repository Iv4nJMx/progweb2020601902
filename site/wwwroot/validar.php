<?php
session_start();
require_once 'conexionbd.php'; // Conexión con $conexion

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$mantenerSesion = isset($_POST['mantener_sesion']);

$stmt = $conexion->prepare("SELECT ID_Usuario, Usuario, Contrasena, Rol FROM Personal WHERE Usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();

    if (password_verify($contrasena, $fila['Contrasena'])) {
        // Guardar en sesión
        $_SESSION['usuario'] = $fila['Usuario'];
        $_SESSION['rol'] = $fila['Rol'];
        $_SESSION['id_usuario'] = $fila['ID_Usuario'];

        // Guardar en cookies si se marcó "mantener sesión"
        if ($mantenerSesion) {
            setcookie("usuario", $fila['Usuario'], time() + (86400 * 30), "/");
            setcookie("rol", $fila['Rol'], time() + (86400 * 30), "/");
        }

        // Redirigir a una sola página home
        header("Location: home.php");
        exit;
    }
}

// Si falla la autenticación
echo "<script>
    alert('❌ Usuario o contraseña incorrectos.');
    window.location.href = 'index.html';
</script>";

$stmt->close();
$conexion->close();
?>