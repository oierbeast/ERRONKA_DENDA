<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Kotxeak</title>
    <!-- CAMBIAR: título "Albisteak" por "Kotxeak" -->
</head>
<body>
    <h1>Administrazio gunea</h1>
    <!-- No es necesario cambiarlo, sigue siendo la zona de administración -->

    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Produktu berria</h2>

    <p>Produktua gorde da</p>

    <table cellspacing="5" cellpadding="5" border="1">
        <tr>
            <td align="right">Izena:</td>
            <td><?php echo isset($izena) ? htmlspecialchars($izena) : '' ?></td>
        </tr>
        <tr>
            <td align="right">Kontsola:</td>
            <td><?php echo isset($kontsola) ? htmlspecialchars($kontsola) : '' ?></td>
        </tr>
        <tr>
            <td align="right">Marka:</td>
            <td><?php echo isset($marka) ? htmlspecialchars($marka) : '' ?></td>
        </tr>
        <tr>
            <td align="right">Urtea:</td>
            <td><?php echo isset($urtea) ? htmlspecialchars($urtea) : '' ?></td>
        </tr>
        <tr>
            <td align="right">Prezioa:</td>
            <td><?php echo isset($prezioa) ? htmlspecialchars($prezioa) : '' ?></td>
        </tr>
    </table>
</body>
</html>
