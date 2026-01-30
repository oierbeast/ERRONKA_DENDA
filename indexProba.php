
<?php
require

use com\leartik\daw24oiur\produktuak\ProduktuakDB;

$nobedadeak = DiskoaDB::selectNobedadeak();
$deskontuak = DiskoaDB::selectDeskontua();

if (isset($_GET['id'])) && is_numeric($_GET['id'])