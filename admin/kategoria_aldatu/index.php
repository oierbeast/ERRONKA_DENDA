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
    $mezua = "";
    if (isset($_POST['aldatu'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $izenburua = isset($_POST['izenburua']) ? trim($_POST['izenburua']) : '';
        $deskribapena = isset($_POST['deskribapena']) ? trim($_POST['deskribapena']) : '';

        if (strlen($izenburua) > 0) {
            $kategoria = new Kategoria();
            if ($id !== null) {
                $kategoria->setId((int)$id);
            }
            $kategoria->setIzenburua($izenburua);
            $kategoria->setDeskribapena($deskribapena);

            if (KategoriaDB::updateKategoria($kategoria) > 0) {
                include('kategoria_gorde_da.php');
            } else {
                include('kategoria_ez_da_gorde.php');
            }
        } else {
            $mezua = "Izenburu eremu nahitaezkoa da";
            $kategoria = KategoriaDB::selectKategoria($id);
            include('kategoria_aldatu.php');
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kategoria = KategoriaDB::selectKategoria($id);
        if ($kategoria != null) {
            include('kategoria_aldatu.php');
        } else {
            header("location: index.php?error=kategoria_ez_da_gorde.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: ../index.php");
}
?>
