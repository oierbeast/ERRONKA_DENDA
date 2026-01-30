<?php
// Barra de navegación reutilizable (incluida por páginas como /kategoria/*)
// Detectar el nivel actual del directorio
$current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
$root_dir = dirname(dirname(dirname(__DIR__))) . '/ERRONKA_01';
$relative_path = str_repeat('../', substr_count(str_replace($root_dir, '', $current_dir), '/'));
?>
<div class="header-container">
  <h1>Steamnet Explorer</h1>
  <nav>
    <a href="<?php echo $relative_path; ?>?p=catalogo">Katalogoa</a>
    <a href="<?php echo $relative_path; ?>kategoria/">Kategoriak</a>
    <a href="<?php echo $relative_path; ?>nire_produktuak/index.php">Nire Produktuak</a>
    <a href="<?php echo $relative_path; ?>komentario_berria/index.php">Kontaktua</a>
  </nav>
</div>
