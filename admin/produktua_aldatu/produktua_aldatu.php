<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Produktuak</title>
    <!-- CAMBIAR: título "Albisteak" por "Produktuak" -->
    <script src="/ERRONKA_01/js/produktua_aldatu.js" defer></script>
</head>
<body>
    <h1>Produktuen administrazio gunea</h1>
    <!-- CAMBIAR: "Albisteen" por "Produktuen" -->

    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Produktua aldatu</h2>
    <!-- CAMBIAR: "Albistea aldatu" por "Produktua aldatu" -->

    <p><?php echo $mezua ?></p>

    <form id="produktuaForm" action="index.php" method="post">
        <!-- Probablemente no cambie la acción, salvo que el archivo principal también cambie de nombre -->

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($produktua->getId()) ?>">

        <p>
            <label for="izena">Izena</label>
            <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo htmlspecialchars($produktua->getIzena()) ?>">
        </p>

        <p>
            <label for="kontsola">Kontsola</label>
            <input type="text" id="kontsola" name="kontsola" size="50" maxlength="255" value="<?php echo htmlspecialchars($produktua->getKontsola()) ?>">
        </p>

        <p>
            <label for="marka">Marka</label>
            <input type="text" id="marka" name="marka" size="50" maxlength="255" value="<?php echo htmlspecialchars($produktua->getMarka()) ?>">
        </p>

        <p>
            <label for="urtea">Urtea</label>
            <input type="number" id="urtea" name="urtea" value="<?php echo htmlspecialchars($produktua->getUrtea()) ?>" min="1900" max="2100" step="1">
        </p>

        <p>
            <label for="prezioa">Prezioa</label>
            <input type="number" id="prezioa" name="prezioa" value="<?php echo htmlspecialchars($produktua->getPrezioa()) ?>" min="0" step="0.01">
        </p>

        <p>
            <label for="kategoria_id">Kategoria ID</label>
            <input type="number" id="kategoria_id" name="kategoria_id" value="<?php echo htmlspecialchars($produktua->getKategoriaId() ?? '') ?>" min="0" step="1">
        </p>

        <p>
            <input type="submit" name="aldatu" value="Aldatu">
        </p>
    </form>

</body>
</html>
