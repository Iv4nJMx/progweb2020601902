<?php
session_start();

// Comrpueba si hay sesión activa
if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol'])) {
    // Si hay cookies recrea la sesión
    if (isset($_COOKIE['usuario']) && isset($_COOKIE['rol'])) {
        $_SESSION['usuario'] = $_COOKIE['usuario'];
        $_SESSION['rol'] = $_COOKIE['rol'];
    } else {
        // Regresa al Login si no hay nada
        header("Location: ../index.html");
        exit();
    }
}