<?php
/******************************
 * 🍪 VERSIÓN CON COOKIES
 ******************************/

require('..//klaseak/com/leartik/daw24oiur/produktuak/produktua.php');
require('..//klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php');

use com\leartik\daw24oiur\produktuak\Produktua;
use com\leartik\daw24oiur\produktuak\ProduktuaDB;
use com\leartik\daw24oiur\produktuak\KomentarioaDB;

$admin = false;

if (isset($_POST['sartu'])) {

    if ($_POST['erabiltzailea'] == "admin" && $_POST['pasahitza'] == "admin") {
        $admin = true;
        setcookie("erabiltzailea", "admin", time() + 86400); // Cookie válida 1 día
    }

} else if (isset($_COOKIE['erabiltzailea']) && $_COOKIE['erabiltzailea'] == "admin") {
    $admin = true;
}

if ($admin == true) {
    require('../klaseak/com/leartik/daw24oiur/kategoria/kategoria.php');
    require('../klaseak/com/leartik/daw24oiur/kategoria/kategoria_db.php');
    require('../klaseak/com/leartik/daw24oiur/produktuak/komentarioa.php');
    require('../klaseak/com/leartik/daw24oiur/produktuak/komentarioa_db.php');
    
    $produktuak = ProduktuaDB::selectProduktuak();
    $kategoriak = \com\leartik\daw24oiur\kategoria\KategoriaDB::selectKategoriak();
    $komentarioak = KomentarioaDB::selectAllKomentarioak();
    include('admin_panel_principal.php');
} else {
    if (isset($_POST['sartu'])) {
        $mezua = "Datuak ez dira zuzenak";
    } else {
        $mezua = "";
    }
    include('login.php');
}



/******************************
 * 💾 VERSIÓN CON SESSION
 ******************************/

// require('..//klaseak/com/leartik/daw24oiur/produktuak/produktua.php');
// require('..//klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php');

// use com\leartik\daw24oiur\produktuak\Produktua;
// use com\leartik\daw24oiur\produktuak\ProduktuaDB;

// session_start(); // Iniciamos la sesión

// $admin = false;

// // Si se ha enviado el formulario de login
// if (isset($_POST['sartu'])) {
//     if ($_POST['erabiltzailea'] == "admin" && $_POST['pasahitza'] == "admin") {
//         $_SESSION['erabiltzailea'] = "admin";
//         $admin = true;
//     }
// // Si ya hay una sesión activa
// } else if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
//     $admin = true;
// }

// if ($admin == true) {
//     $produktuak = ProduktuaDB::selectProduktuak();
//     include('produktuak_erakutsi.php');
// } else {
//     if (isset($_POST['sartu'])) {
//         $mezua = "Datuak ez dira zuzenak";
//     } else {
//         $mezua = "";
//     }
//     include('login.php');
// }
?>
