<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/* User und Content Felder dürfen nicht leer sein*/ 
if (!empty($_REQUEST['user']) && !empty ($_REQUEST['content'])){

    /* Farbe setzen für die Ausgegebenen Objekte*/
    $bgColor = '#008080';

echo 
 /* Tabellen Design- Wie Spalte und Wo soll diese sein? */
 '<table cellspacing="2" align="center" width="350">
<tr>
<td bgcolor="'.$bgColor.'">'.$_REQUEST['user'].'</td> <td bgcolor="'.$bgColor.'">'.$_REQUEST['content'].'</td>
</tr> </table>';

}
?>
<br />
<form action="shoutbox.php" method="post">
<table align="center" width="350"> <tr>
<td>Name:</td>
<td><input type="text" name="user" value="" /></td> </tr>
<tr>
<td>Inhalt:</td>
<td><input type="text" name="content" value="" /></td> </tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="shout" value="rufen" />
</td> </tr>
</table>

</form>
</body>
</html>