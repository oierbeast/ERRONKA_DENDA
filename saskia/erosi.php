<?php
session_start();
require_once __DIR__ . '/../com/leartik/daw24oiur/saskia/saskia.php';
require_once __DIR__ . '/../com/leartik/daw24oiur/saskia/saskia_db.php';
require_once __DIR__ . '/../klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php';

use com\leartik\daw24oiur\saskia\Saskia;
use com\leartik\daw24oiur\saskia\SaskiaDB;
use com\leartik\daw24oiur\produktuak\ProduktuaDB;

// Comprobar si el usuario está logueado
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    // Si no es admin, redirigir a login (opcional según tu lógica)
    // header('Location: ../admin/login.php');
    // exit;
}

$saskia = new Saskia();
$edukia = $saskia->getEdukia();

if (empty($edukia)) {
    header('Location: ./saskia_erakutsi.php');
    exit;
}

// Calcular total
$totalGuztira = 0;
foreach ($edukia as $id => $kantitatea) {
    $produktua = ProduktuaDB::selectProduktua($id);
    if ($produktua) {
        $totalGuztira += $produktua->getPrezioa() * $kantitatea;
    }
}

// Guardar el pedido - para este ejemplo usamos un ID de usuario fijo
$erabiltzaile_id = 1; // En producción, obtener del usuario logueado

try {
    $eskaria_id = SaskiaDB::gordeEskaria($erabiltzaile_id, $edukia, $totalGuztira);
    $saskia->garbitu();
    header('Location: ../eskerrik_asko.php?eskaria_id=' . $eskaria_id);
    exit;
} catch (Exception $e) {
    $_SESSION['errorea'] = "Errorea erosketak gorde ditzean: " . $e->getMessage();
    header('Location: ./saskia_erakutsi.php');
    exit;
}
?>
