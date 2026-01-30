<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Produktuak</title>
    <!-- CAMBIAR: título "Albisteak" por "Produktuak" -->
</head>
<body>
    <h1>Produktuen administrazio gunea</h1>
    <!-- CAMBIAR: "Albisteen" por "Produktuen" -->

    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Produktua ezabatu</h2>
    <!-- CAMBIAR: "Albistea ezabatu" por "Produktua ezabatu" -->

    <p style="color: red;">
        Ziur zaude hurrengo Produktua ezabatu nahi duzula?
        <strong>Ekintza hau ezin da desegin.</strong>
        <!-- CAMBIAR: texto a algo como "Ziur zaude hurrengo produktua ezabatu nahi duzula?" -->
    </p>

    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $produktua->getId() ?>">
        <!-- CAMBIAR: variable $albistea por $produktua -->

        <p>
            <input type="submit" name="ezabatu" value="Bai, ezabatu"> 
            <a href="../">Ez, utzi bertan behera</a>
        </p>
    </form>

    <h3>Ezabatuko den produktua:</h3>

    <ul>
        <li>Izena: <?php echo htmlspecialchars($produktua->getIzena()) ?></li>
        <li>Kontsola: <?php echo htmlspecialchars($produktua->getKontsola()) ?></li>
        <li>Marka: <?php echo htmlspecialchars($produktua->getMarka()) ?></li>
        <li>Urtea: <?php echo htmlspecialchars($produktua->getUrtea()) ?></li>
        <li>Prezioa: <?php echo htmlspecialchars($produktua->getPrezioa()) ?></li>
    </ul>
</body>
</html>
