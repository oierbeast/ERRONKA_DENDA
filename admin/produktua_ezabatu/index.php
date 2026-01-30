<?php
/******************************
 * 🍪 VERSIÓN CON COOKIES
 ******************************/

require('../../klaseak/com/leartik/daw24oiur/produktuak/produktua.php');
require('../../klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php');

use com\leartik\daw24oiur\produktuak\Produktua;
use com\leartik\daw24oiur\produktuak\ProduktuaDB;

if (isset($_COOKIE['erabiltzailea']) && $_COOKIE['erabiltzailea'] == "admin") {
    $admin = true;
} else {
    $admin = false;
}

if ($admin == true) {
    if (isset($_POST['ezabatu'])) { 
        $id = $_POST['id'];
        if (ProduktuaDB::deleteProduktua($id) > 0) {  
            include('produktua_ezabatu_da.php');   
        } else {  
            include('produktua_ez_da_ezabatu.php');    
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
    $produktua = ProduktuaDB::selectProduktua($id); 
        if ($produktua != null) { 
            include('produktua_ezabatu.php'); 
        } else {
            header("location: index.php?error=produktua_ez_da_ezabatu.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: ../index.php");
}



/******************************
 * 💾 VERSIÓN CON SESSION
 ******************************/

// require('../../klaseak/com/leartik/daw24oiur/produktuak/produktua.php');
// require('../../klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php');

// use com\leartik\daw24oiur\produktuak\Produktua;
// use com\leartik\daw24oiur\produktuak\ProduktuaDB;

// session_start();

// if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
//     $admin = true;
// } else {
//     $admin = false;
// }

// if ($admin == true) {
//     if (isset($_POST['ezabatu'])) { 
//         $id = $_POST['id'];
//         if (KotxeaDB::deleteKotxea($id) > 0) {  
//             include('kotxea_ezabatu_da.php');   
//         } else {  
//             include('kotxea_ez_da_ezabatu.php');    
//         }
//     } elseif (isset($_GET['id'])) {
//         $id = $_GET['id'];
//         $kotxea = KotxeaDB::selectKotxea($id); 
//         if ($kotxea != null) { 
//             include('kotxea_ezabatu.php'); 
//         } else {
//             header("location: index.php?error=kotxea_ez_da_ezabatu.php");
//         }
//     } else {
//         header("location: index.php");
//     }
// } else {
//     header("location: ../index.php");
// }
?>
