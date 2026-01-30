<?php
// Logout: borrar cookie 'erabiltzailea' y redirigir al inicio

// Borramos la cookie tanto para la ruta por defecto como para la raíz (/)
setcookie('erabiltzailea', '', time() - 3600);
setcookie('erabiltzailea', '', time() - 3600, '/');

// También eliminar de la superglobal por si acaso
if (isset($_COOKIE['erabiltzailea'])) {
    unset($_COOKIE['erabiltzailea']);
}

// Redirigir al índice de la aplicación
header('Location: ./index.php');
exit;
?>
