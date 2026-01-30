<?php
session_start();
require_once __DIR__ . '/../com/leartik/daw24oiur/saskia/saskia.php';

use com\leartik\daw24oiur\saskia\Saskia;

$saskia = new Saskia();

// Acción: Gehitu (añadir al carrito)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gehitu'])) {
    $id = intval($_POST['gehitu']);
    $kantitatea = isset($_POST['kantitatea']) ? intval($_POST['kantitatea']) : 1;
    if ($kantitatea > 0) {
        $saskia->gehitu($id, $kantitatea);
    }
    header('Location: ./saskia_erakutsi.php');
    exit;
}

// Acción: Aldatu (modificar cantidad)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aldatu'])) {
    $id = intval($_POST['aldatu']);
    $kantitatea = intval($_POST['kantitatea'][$id] ?? 1);
    if ($kantitatea > 0) {
        $saskia->aldatu($id, $kantitatea);
    } else {
        $saskia->ezabatu($id);
    }
    header('Location: ./saskia_erakutsi.php');
    exit;
}

// Acción: Ezabatu (eliminar)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ezabatu'])) {
    $id = intval($_POST['ezabatu']);
    $saskia->ezabatu($id);
    header('Location: ./saskia_erakutsi.php');
    exit;
}

// Si no hay acción, mostrar la vista
require 'saskia_erakutsi.php';
?>
