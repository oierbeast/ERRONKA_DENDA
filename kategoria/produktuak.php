<?php
// Recoger el id de la categoría
$kategoria_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Datos de categorías
$kategoriak = [
    1 => ["izenburua" => "Nintendo"],
    2 => ["izenburua" => "Sony"],
    3 => ["izenburua" => "Sega"],
    4 => ["izenburua" => "Beste Batzuk"],
];

// Conexión a la base de datos correcta
$db = new PDO('sqlite:../produktuak.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obtener productos de la categoría
$stmt = $db->prepare("SELECT id, izena, kontsola, marka, urtea, prezioa FROM produktuak WHERE kategoria_id = :kid");
$stmt->execute([':kid' => $kategoria_id]);
$produktuak = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nombre de la categoría
$izenburua = isset($kategoriak[$kategoria_id]) ? $kategoriak[$kategoria_id]["izenburua"] : "Kategoria ezezaguna";
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Produktuak - <?php echo htmlspecialchars($izenburua); ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/kategoria.css">
</head>
<body>
    <div class="header-container">
      <h1>Steamnet Explorer</h1>
      <nav>
        <a href="/ERRONKA_01/?p=catalogo">Katalogoa</a>
        <a href="/ERRONKA_01/kategoria/">Kategoriak</a>
        <a href="/ERRONKA_01/nire_produktuak/index.php">Nire Produktuak</a>
        <a href="/ERRONKA_01/komentario_berria/index.php">Kontaktua</a>
      </nav>
    </div>
        <main>
            <div class="container">
        <h1 style="margin-top:30px;">Produktuak: <?php echo htmlspecialchars($izenburua); ?></h1>
            <div class="produktuak-container">
            <?php if ($produktuak && count($produktuak) > 0): ?>
                <?php foreach ($produktuak as $p): ?>
                    <?php
                        $izena = htmlspecialchars($p['izena']);
                        $kontsola = htmlspecialchars($p['kontsola']);
                        $marka = htmlspecialchars($p['marka']);
                        $urtea = htmlspecialchars($p['urtea']);
                        $prezioa = htmlspecialchars($p['prezioa']);
                        $img = "../irudiak/" . $p['id'] . ".jpg";
                    ?>
                    <div class="produktua-card">
                        <div class="thumb">
                            <a href="/ERRONKA_01/produktua.php?id=<?php echo $p['id']; ?>">
                                <img src="<?php echo $img; ?>" alt="<?php echo $izena; ?>" loading="lazy" width="600" height="800" onerror="this.src='../irudiak/4.png'">
                            </a>
                        </div>
                        <div class="info">
                            <h3><a href="/ERRONKA_01/produktua.php?id=<?php echo $p['id']; ?>" style="color:inherit; text-decoration:none;"><?php echo $izena; ?></a></h3>
                            <p><strong>Kontsola:</strong> <?php echo $kontsola; ?></p>
                            <p><strong>Marka:</strong> <?php echo $marka; ?></p>
                            <p><strong>Urtea:</strong> <?php echo $urtea; ?></p>
                            <p><strong>Prezioa:</strong> <?php echo $prezioa; ?> €</p>
                            <form method="POST" action="/ERRONKA_01/saskia/index.php" style="margin-top: 10px;">
                                <input type="hidden" name="gehitu" value="<?php echo $p['id']; ?>">
                                <input type="number" name="kantitatea" value="1" min="1" style="width: 50px; padding: 5px;">
                                <button type="submit" style="padding: 6px 12px; background-color: #008CBA; color: white; border: none; border-radius: 3px; cursor: pointer;">Saskira</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Ez dago produkturik kategoria honetan.</p>
            <?php endif; ?>
        </div>
        <div class="centered-button-bottom">
            <a class="botoia" href="/ERRONKA_01/kategoria/">Itzuli</a>
        </div>
            </div>
        </main>
    </div>
</body>
</html>
