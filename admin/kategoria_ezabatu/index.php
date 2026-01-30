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
    if (isset($_POST['ezabatu'])) {
        $id = $_POST['id'];
        if (KategoriaDB::deleteKategoria($id) > 0) {
            include('kategoria_ezabatu_da.php');
        } else {
            include('kategoria_ez_da_ezabatu.php');
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kategoria = KategoriaDB::selectKategoria($id);
        if ($kategoria != null) {
            include('kategoria_ezabatu.php');
        } else {
            header("location: index.php?error=kategoria_ez_da_ezabatu.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: ../index.php");
}
?>
