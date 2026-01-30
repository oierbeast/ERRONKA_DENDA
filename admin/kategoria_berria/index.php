<?php
require('../../klaseak/com/leartik/daw24oiur/kategoria/kategoria.php');
require('../../klaseak/com/leartik/daw24oiur/kategoria/kategoria_db.php');

use com\leartik\daw24oiur\kategoria\Kategoria;
use com\leartik\daw24oiur\kategoria\KategoriaDB;

if (isset($_COOKIE['erabiltzailea']) && $_COOKIE['erabiltzailea'] == "admin") {
    $admin = true;
} else {
    $admin = false;
}

if ($admin == true) {
    if (isset($_POST['gorde'])) {
        $izenburua = isset($_POST['izenburua']) ? trim($_POST['izenburua']) : '';
        $deskribapena = isset($_POST['deskribapena']) ? trim($_POST['deskribapena']) : '';

        if (strlen($izenburua) > 0) {
            $kategoria = new Kategoria();
            $kategoria->setIzenburua($izenburua);
            $kategoria->setDeskribapena($deskribapena);

            if (KategoriaDB::insertKategoria($kategoria) > 0) {
                include('kategoria_gorde_da.php');
            } else {
                include('kategoria_ez_da_gorde.php');
            }
        } else {
            $mezua = "Izenburu eremu nahitaezkoa da";
            include('kategoria_berria.php');
        }
    } else {
        $izenburua = "";
        $deskribapena = "";
        include('kategoria_berria.php');
    }
} else {
    header("location: ../index.php");
}
?>
