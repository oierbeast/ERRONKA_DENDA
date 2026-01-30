<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Kategoria gorde da</title>
</head>
<body>
    <h1>Administratzaile gunea</h1>
    <p><a href="..">Hasiera</a> &gt;</p>

    <h2>Kategoria gorde da</h2>
    <p>Kategoria zuzen gorde da datu-basetik.</p>

    <table cellspacing="5" cellpadding="5" border="1">
        <tr>
            <td align="right">Izenburu:</td>
            <td><?php echo isset($izenburua) ? htmlspecialchars($izenburua) : '' ?></td>
        </tr>
        <tr>
            <td align="right">Deskribapena:</td>
            <td><?php echo isset($deskribapena) ? htmlspecialchars($deskribapena) : '' ?></td>
        </tr>
    </table>

    <p><a href="..">Itzuli administratzaile guneara</a></p>
</body>
</html>
