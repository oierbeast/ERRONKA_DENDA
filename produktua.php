<?php
require_once __DIR__ . '/klaseak/com/leartik/daw24oiur/produktuak/produktua.php';
require_once __DIR__ . '/klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php';

use com\leartik\daw24oiur\produktuak\ProduktuaDB;

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produktua = null;
if ($id > 0) {
  $produktua = ProduktuaDB::selectProduktua($id);
}
?>
<!doctype html>
<html lang="eu">
<head>
  <meta charset="utf-8">
  <title>Produktua</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/produktua.css">
</head>
<body>
  <?php include 'index_bar.php'; ?>
  <main>
    <div class="produktua-detail">
      <?php if ($produktua): ?>
        <?php $img = 'irudiak/' . $produktua->getId() . '.jpg'; ?>
        <div class="thumb">
          <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($produktua->getIzena()); ?>" onerror="this.src='irudiak/4.png'">
        </div>
        <div class="info">
        <h2><?php echo htmlspecialchars($produktua->getIzena()); ?></h2>
        <div class="produktua-meta">
          <p><strong>Kontsola:</strong> <?php echo htmlspecialchars($produktua->getKontsola()); ?></p>
          <p><strong>Marka:</strong> <?php echo htmlspecialchars($produktua->getMarka()); ?></p>
          <p><strong>Urtea:</strong> <?php echo htmlspecialchars($produktua->getUrtea()); ?></p>
          <p><strong>Prezioa:</strong> <?php echo htmlspecialchars($produktua->getPrezioa()); ?> €</p>
          <?php
            $kategoriak = [1 => 'Nintendo', 2 => 'Sony', 3 => 'Sega', 4 => 'Beste Batzuk'];
            $kid = $produktua->getKategoriaId();
            if ($kid) {
                $kname = isset($kategoriak[$kid]) ? $kategoriak[$kid] : 'Kategoria ezezaguna';
                echo '<p><strong>Kategoria:</strong> <a href="/ERRONKA_01/kategoria/produktuak.php?id=' . intval($kid) . '">' . htmlspecialchars($kname) . '</a></p>';
            }
          ?>
        </div>
        </div>
        <div class="clear"></div>
      <?php else: ?>
        <p>Produktua aurkitu ez da.</p>
      <?php endif; ?>
    </div>

    <?php if ($produktua): ?>
    <div style="text-align: center; margin: 30px 0;">
      <form method="POST" action="/ERRONKA_01/saskia/index.php" style="display: inline;">
        <input type="hidden" name="gehitu" value="<?php echo $produktua->getId(); ?>">
        <input type="number" name="kantitatea" value="1" min="1" style="width: 60px; padding: 8px; margin-right: 10px;">
        <button type="submit" class="botoia" style="padding: 10px 30px; font-size: 16px;">Saskira gehitu</button>
      </form>
    </div>
    <?php endif; ?>

    <?php
      // Default back to home
      $back = '/ERRONKA_01/';

      // If we came from an internal page, prefer that referer
      if (!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'ERRONKA_01') !== false) {
          $back = $_SERVER['HTTP_REFERER'];
      } else {
          // Otherwise, if the product has a category, go to that category product list
          if (isset($produktua) && method_exists($produktua, 'getKategoriaId') && $produktua->getKategoriaId()) {
              $back = '/ERRONKA_01/kategoria/produktuak.php?id=' . intval($produktua->getKategoriaId());
          }
      }
    ?>

    <div class="detail-back">
      <p><a class="botoia" href="<?php echo htmlspecialchars($back); ?>">Itzuli</a></p>
    </div>
  </main>
</body>
</html>
