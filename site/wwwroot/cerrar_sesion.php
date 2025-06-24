<?php
session_start();
session_unset();
session_destroy();

// Eliminacion de cookies
setcookie("usuario", "", time() - 3600, "/");
setcookie("rol", "", time() - 3600, "/");

header("Location: ../index.html");
exit();
?>