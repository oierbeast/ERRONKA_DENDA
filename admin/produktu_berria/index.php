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

    if (isset($_POST['gorde'])) {

        $izena = isset($_POST['izena']) ? trim($_POST['izena']) : '';
        $kontsola = isset($_POST['kontsola']) ? trim($_POST['kontsola']) : '';
        $marka = isset($_POST['marka']) ? trim($_POST['marka']) : '';
        $urtea = isset($_POST['urtea']) ? $_POST['urtea'] : null;
        $prezioa = isset($_POST['prezioa']) ? $_POST['prezioa'] : null;
        $kategoria_id = isset($_POST['kategoria_id']) ? $_POST['kategoria_id'] : null;

        if (strlen($izena) > 0 && strlen($kontsola) > 0 && strlen($marka) > 0 && is_numeric($urtea) && is_numeric($prezioa)) {

            $produktua = new Produktua();
            $produktua->setIzena($izena);
            $produktua->setKontsola($kontsola);
            $produktua->setMarka($marka);
            $produktua->setUrtea((int)$urtea);
            $produktua->setPrezioa((float)$prezioa);
            if ($kategoria_id !== null && $kategoria_id !== '') {
                $produktua->setKategoriaId((int)$kategoria_id);
            }

            if (ProduktuaDB::insertProduktua($produktua) > 0) {
                include('produktua_gorde_da.php');
            } else {
                include('produktua_ez_da_gorde.php');
            }

        } else {
            $mezua = "Eremu guztiak bete behar dira";
            // preserve entered values for redisplay
            include('produktu_berria.php');
        }

    } else {
        $izena = "";
        $kontsola = "";
        $marka = "";
        $urtea = 0;
        $prezioa = 0.00;
        $kategoria_id = "";
        include('produktu_berria.php');
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

//     if (isset($_POST['gorde'])) {
        
//         $marka = $_POST['marka'];
//         $modeloa = $_POST['modeloa'];
//         $urtea = $_POST['urtea'];
//         $prezioa = $_POST['prezioa'];

//         if (strlen($marka) > 0 && strlen($modeloa) > 0 && is_numeric($urtea) && is_numeric($prezioa)) {
            
//             $kotxea = new Kotxea();
//             $kotxea->setMarka($marka);
//             $kotxea->setModeloa($modeloa);
//             $kotxea->setUrtea($urtea);
//             $kotxea->setPrezioa($prezioa);

//             if (KotxeaDB::insertKotxea($kotxea) > 0) {
//                 include('kotxea_gorde_da.php');
//             } else {
//                 include('kotxea_ez_da_gorde.php');
//             }

//         } else {
//             $mezua = "Eremu guztiak bete behar dira";
//             include('kotxe_berria.php');
//         }

//     } else {
//         $marka = "";
//         $modeloa = "";
//         $urtea = 0;
//         $prezioa = 0.00;
//         include('kotxe_berria.php');
//     }

// } else {
//     header("location: ../index.php");
// }
?>
