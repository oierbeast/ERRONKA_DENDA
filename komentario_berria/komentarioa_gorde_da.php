<p>Komentarioa gorde da</p>
<table cellspacing="5" cellpadding="5" border="1">
<tr>
<td align="right">Izena:</td>
<td><?php echo $izena ?></td>
</tr>
<tr>
<td align="right">Komentarioaren testua:</td>
<td><?php echo $komentarioaren_testua ?></td>
</tr>
</table>
<form action=".." method="get">
<p>
<input type="submit" value="Itzuli">
<input type="text" name="id" value="<?php echo $id ?>" readonly>
</p>
</form>