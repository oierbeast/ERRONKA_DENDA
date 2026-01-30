<?php
require('../klaseak/com/leartik/daw24oiur/produktuak/komentarioa.php');
require('../klaseak/com/leartik/daw24oiur/produktuak/komentarioa_db.php');
use com\leartik\daw24oiur\produktuak\Komentarioa;
use com\leartik\daw24oiur\produktuak\KomentarioaDB;

if (isset($_POST['id']) && isset($_POST['izena']) && isset($_POST['komentarioaren_testua'])) {

    $id = $_POST['id'];
    $izena = $_POST['izena'];
    $komentarioaren_testua = $_POST['komentarioaren_testua'];


  $komentarioa = new Komentarioa();
    $komentarioa->setIdAlbistea($id);
    $komentarioa->setIzena($izena);
    $komentarioa->setKomentarioarenTestua($komentarioaren_testua);

    if (KomentarioaDB::insertKomentarioa($komentarioa) > 0) {
        include('komentarioa_gorde_da.php');
    } else {
        include('komentarioa_ez_da_gorde.php');
    } 
} else {
    $id = $_GET['id'];
    include('komentario_berria.php');
}