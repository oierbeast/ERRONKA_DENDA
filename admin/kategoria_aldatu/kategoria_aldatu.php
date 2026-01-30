<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Kategoria aldatu</title>
</head>
<body>
    <h1>Administratzaile gunea</h1>
    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Kategoria aldatu</h2>
    <p><?php echo isset($mezua) ? $mezua : '' ?></p>

    <form id="kategoriaForm" action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($kategoria->getId()) ?>">

        <p>
            <label for="izenburua">Izenburu</label>
            <input type="text" id="izenburua" name="izenburua" size="50" maxlength="255" value="<?php echo htmlspecialchars($kategoria->getIzenburua()) ?>" required>
        </p>

        <p>
            <label for="deskribapena">Deskribapena</label>
            <textarea id="deskribapena" name="deskribapena" rows="5" cols="50"><?php echo htmlspecialchars($kategoria->getDeskribapena()) ?></textarea>
        </p>

        <p>
            <input type="submit" name="aldatu" value="Aldatu">
        </p>
    </form>
</body>
</html>
