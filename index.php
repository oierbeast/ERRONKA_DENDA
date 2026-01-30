<?php
require_once __DIR__ . '/klaseak/com/leartik/daw24oiur/produktuak/produktua.php';
require_once __DIR__ . '/klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php';

use com\leartik\daw24oiur\produktuak\ProduktuaDB;
?>
<!doctype html>
<html lang="eu">
<head>
  <meta charset="utf-8"> 
  <title>Steamnet Explorer</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <div class="header-container">
    <h1>Steamnet Explorer</h1>
    <nav>
      <a href="/ERRONKA_01/?p=catalogo">Katalogoa</a>
      <a href="/ERRONKA_01/kategoria/">Kategoriak</a>
      <a href="/ERRONKA_01/nire_produktuak/index.php">Nire Produktuak</a>
      <a href="/ERRONKA_01/komentario_berria/">Kontaktua</a>
    </nav>
  </div>

  <main>
    <h2>Produktuak</h2>
    <div class="produktuak-container">
      <?php
    $produktuak = ProduktuaDB::selectProduktuak();
    if ($produktuak && count($produktuak) > 0) {
      foreach ($produktuak as $produktua) {
        $izena = htmlspecialchars($produktua->getIzena());
        $kontsola = htmlspecialchars($produktua->getKontsola());
        $marka = htmlspecialchars($produktua->getMarka());
        $urtea = htmlspecialchars($produktua->getUrtea());
        $prezioa = htmlspecialchars($produktua->getPrezioa());
        $img = "irudiak/" . $produktua->getId() . ".jpg";

        echo '<div class="produktua-card">';

        // IMAGEN (en un marco fijo)
        echo '<div class="thumb">';
        echo '<a href="/ERRONKA_01/produktua.php?id=' . $produktua->getId() . '">';
        echo '<img src="' . $img . '" alt="' . $izena . '" loading="lazy" width="600" height="800" onerror="this.src=\'irudiak/4.png\'">';
        echo '</a>';
        echo '</div>';

        // TEXTO
        echo '<div class="info">';
        echo '<h3><a href="/ERRONKA_01/produktua.php?id=' . $produktua->getId() . '" style="color:inherit; text-decoration:none;">' . $izena . '</a></h3>';
        echo '<p><strong>Kontsola:</strong> ' . $kontsola . '</p>';
        echo '<p><strong>Marka:</strong> ' . $marka . '</p>';
        echo '<p><strong>Urtea:</strong> ' . $urtea . '</p>';
        echo '<p><strong>Prezioa:</strong> ' . $prezioa . '€</p>';
        echo '<form method="POST" action="/ERRONKA_01/saskia/index.php" style="margin-top: 10px;">';
        echo '<input type="hidden" name="gehitu" value="' . $produktua->getId() . '">';
        echo '<input type="number" name="kantitatea" value="1" min="1" style="width: 50px; padding: 5px;">';
        echo '<button type="submit" style="padding: 6px 12px; background-color: #008CBA; color: white; border: none; border-radius: 3px; cursor: pointer;">Saskira</button>';
        echo '</form>';
        echo '</div>';

        echo '</div>';
      }
    } else {
      echo '<p>Ez dago produkturik bistaratzerik.</p>';
    }
      ?>
    </div>

    <div style="margin-top: 20px; text-align: center;">
      <a class="botoia" href="/ERRONKA_01/kategoria/">Kategoriaka sailkatuta →</a>
      <p>Nahi duzun joko retroa aurki dezakezu.<br>Urteka banatuta, kontsolaka banantuta.</p>
    </div>
  </main>
</body>
</html>
