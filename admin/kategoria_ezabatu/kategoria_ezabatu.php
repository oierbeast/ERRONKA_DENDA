<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Kategoria ezabatu</title>
</head>
<body>
    <h1>Administratzaile gunea</h1>
    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Kategoria ezabatu</h2>
    <p style="color: red;">
        Ziur zaude hurrengo kategoria ezabatu nahi duzula?
        <strong>Ekintza hau ezin da desegin.</strong>
    </p>

    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($kategoria->getId()) ?>">
        <p>
            <input type="submit" name="ezabatu" value="Bai, ezabatu">
            <a href="../">Ez, utzi bertan behera</a>
        </p>
    </form>

    <h3>Ezabatuko den kategoria:</h3>
    <ul>
        <li>Izenburu: <?php echo htmlspecialchars($kategoria->getIzenburua()) ?></li>
        <li>Deskribapena: <?php echo htmlspecialchars($kategoria->getDeskribapena()) ?></li>
    </ul>
</body>
</html>
