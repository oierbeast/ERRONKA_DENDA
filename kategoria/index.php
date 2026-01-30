<?php
// Cargar categorías desde la base de datos
try {
    $db = new PDO('sqlite:../produktuak.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $kategoriak = $db->query("SELECT id, izena, deskribapena FROM kategoriak ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $kategoriak = [];
    echo "Error cargando categorías: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Kategoriak</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/kategoria.css">
</head>
<body>
    <div class="header-container">
      <h1>Steamnet Explorer</h1>
      <nav>
        <a href="../?p=catalogo">Katalogoa</a>
        <a href="./">Kategoriak</a>
        <a href="../nire_produktuak/index.php">Nire Produktuak</a>
        <a href="../komentario_berria/index.php">Kontaktua</a>
      </nav>
    </div>
    <main>
        <h1 style="margin-top:30px;">Kategoriak</h1>
        <div class="kategoriak-grid">
            <?php foreach ($kategoriak as $kat): ?>
                <div class="kategoria-card">
                    <img src="../irudiak_kategoria/<?php echo $kat['id']; ?>.jpg" alt="<?php echo htmlspecialchars($kat['izena']); ?>" onerror="this.src='../irudiak_kategoria/placeholder.jpg'">
                    <h2><?php echo htmlspecialchars($kat['izena']); ?></h2>
                    <p><?php echo htmlspecialchars($kat['deskribapena']); ?></p>
                    <a href="produktuak.php?id=<?php echo $kat['id']; ?>">Produktuak ikusi</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center; margin-top:8px;">
            <a class="botoia" href="../">Joko guztiak ikusi</a>
        </div>
    </main>
</body>
</html>
