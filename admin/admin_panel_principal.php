<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Bideojokoen Administrazio gunea</title>
</head>
<body>
    <h1>Bideojokoen Administrazio gunea</h1>

     <h2>Kategoriak</h2>
    <?php if (isset($kategoriak) && count($kategoriak) > 0): ?>
        <ul>
        <?php foreach ($kategoriak as $kategoria): ?>
            <li>
                <?php echo htmlspecialchars($kategoria->getIzenburua()); ?>
                [<a href="kategoria_aldatu/?id=<?php echo $kategoria->getId(); ?>">aldatu</a>]
                [<a href="kategoria_ezabatu/?id=<?php echo $kategoria->getId(); ?>">ezabatu</a>]
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ez dago kategoririk.</p>
    <?php endif; ?>

    <form action="kategoria_berria/" method="get" style="margin-top:10px;">
        <button type="submit">berria</button>
    </form>
    
    <h2>Produktuak</h2>
    <?php if (isset($produktuak) && count($produktuak) > 0): ?>
        <ul>
        <?php foreach ($produktuak as $produktua): ?>
            <li>
                <?php echo htmlspecialchars($produktua->getIzena()); ?>
                [<a href="produktua_aldatu/?id=<?php echo $produktua->getId(); ?>">aldatu</a>]
                [<a href="produktua_ezabatu/?id=<?php echo $produktua->getId(); ?>">ezabatu</a>]
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ez dago produkturik.</p>
    <?php endif; ?>

    <form action="produktu_berria/" method="get" style="margin-top:10px;">
        <button type="submit">berria</button>
    </form>

    <h2>Komentarioak</h2>
    <?php if (isset($komentarioak) && count($komentarioak) > 0): ?>
        <ul>
        <?php foreach ($komentarioak as $komentarioa): ?>
            <li>
                <?php echo htmlspecialchars($komentarioa->getIzena()); ?>
                [<a href="komentarioa_aldatu/?id=<?php echo $komentarioa->getId(); ?>">aldatu</a>]
                [<a href="komentarioa_ezabatu/?id=<?php echo $komentarioa->getId(); ?>">ezabatu</a>]
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ez dago komentariorik.</p>
    <?php endif; ?>

   

    <p><a href="irten.php">Sesiotik irten</a></p>

</body>
</html>
