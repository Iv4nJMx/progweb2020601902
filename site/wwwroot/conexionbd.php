<?php
$conexion = mysqli_connect("localhost", "root", "1698", "papeleria");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>