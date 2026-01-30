<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Produktuak</title>
    <!-- CAMBIAR: título "Albisteak" por "Produktuak" -->
    <script src="/ERRONKA_01/js/produktu_berria.js" defer></script>
</head>
<body>
    <h1>Produktuen administrazio gunea</h1>
    <!-- CAMBIAR: "Albisteen" por "Produktuen" -->

    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Produktu berria</h2>
    <!-- CAMBIAR: "Albiste berria" por "Produktu berria" -->


    <form id="produktuBerriaForm" action="index.php" method="post">
        <!-- Probablemente no necesitas cambiar la acción, salvo que el archivo principal también cambie de nombre -->

        <p>
            <label for="izena">Izena</label>
            <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo isset($izena) ? $izena : '' ?>">
        </p>

        <p>
            <label for="kontsola">Kontsola</label>
            <input type="text" id="kontsola" name="kontsola" size="50" maxlength="255" value="<?php echo isset($kontsola) ? $kontsola : '' ?>">
        </p>

        <p>
            <label for="marka">Marka</label>
            <input type="text" id="marka" name="marka" size="50" maxlength="255" value="<?php echo isset($marka) ? $marka : '' ?>">
        </p>

        <p>
            <label for="urtea">Urtea</label>
            <input type="number" id="urtea" name="urtea" value="<?php echo isset($urtea) ? $urtea : 0 ?>">
        </p>

        <p>
            <label for="prezioa">Prezioa</label>
            <input type="number" id="prezioa" name="prezioa" value="<?php echo isset($prezioa) ? $prezioa : 0.00 ?>" step="0.01" min="0">
        </p>

        <p>
            <label for="kategoria_id">Kategoria ID</label>
            <input type="number" id="kategoria_id" name="kategoria_id" value="<?php echo isset($kategoria_id) ? $kategoria_id : '' ?>" min="0" step="1">
        </p>

        <p>
            <input type="submit" name="gorde" value="Gorde">
            <!-- Este botón no necesita cambios -->
        </p>
    </form>
</body>
</html>
