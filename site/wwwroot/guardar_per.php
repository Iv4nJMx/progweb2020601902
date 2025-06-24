<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'conexionbd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $ape_paterno = $_POST["ape_paterno"];
    $ape_materno = $_POST["ape_materno"];
    $tel_personal = $_POST["tel_personal"];
    $tel_casa = $_POST["tel_casa"];
    $fecha_contrato = $_POST["fecha_contrato"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];


    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar en la BD
    $sql = "INSERT INTO Personal (NombrePe, ApePaterno, ApeMaterno, TelPersonal, TelCasa, FechaContrato, Usuario, Contrasena, Rol)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        die("❌Error al conectar con la BD: " . $conexion->error);
    }

    $stmt->bind_param("sssssssss", $nombre, $ape_paterno, $ape_materno, $tel_personal, $tel_casa, $fecha_contrato, $usuario, $contrasena_hash, $rol);

    if ($stmt->execute()) {
        echo "<script>alert('✅Usuario registrado correctamente');window.location.href='configuracion.php';</script>";
    } else {
        echo "❌ Error al registrar al usuario: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>