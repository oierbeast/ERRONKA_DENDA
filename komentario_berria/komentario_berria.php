<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Albisteak</title>
        <script type="text/javascript" src="api.js"></script>
    </head>
    <body>
        <h1>Albisteak</h1>
        <p><a href="..">Hasiera</a> &gt;</p>
        <h2>Komentario berria</h2>
        <div id="komentarioa" style="background-color:#ccc">
        <form>
        <p>
        <label for="izena">Izena</label>
        <input type="text" id="izena" name="izena" size="50" maxlength="50">
        </p>
        <p>
        <label for="komentarioaren_testua">Komentarioaren testua</label>
        <textarea id="komentarioaren_testua" name="komentarioaren_testua"></textarea>
        </p>
        <p>
        <input type="button" id="bidali" name="bidali" value="Bidali" onClick="komentarioaBidali()">
        <input type="button" id="utzi" name="utzi" value="Utzi" onClick="location.href='../?id=<?php echo $id ?>'">
        <input type="text" id="id" name="id" value="<?php echo $id ?>" readonly>
        </p>
        </form>
        </div>
    </body>
</html>