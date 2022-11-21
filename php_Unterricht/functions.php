<?php
// Did we receive user and content data?
if (!empty($_REQUEST['user']) && !empty($_REQUEST['content'])) {

    // Define shout output color
    switch (strtolower($_REQUEST['user'])) {
        case 'moderator':
            $bgColor = '#FF7777';
            break;
        case 'meier':
        case 'meyer':
        case 'mayer':
        case 'maier':
            $bgColor = '#77FF77';
            break;
        case 'schmidt':
            $bgColor = '#7777FF';
            break;
        default:
            $bgColor = '#3399CC';
    }
    // Display shout output in table
    echo '
    <table style="border-spacing: 2px; margin: 0 auto; width: 350px">
    <tr>
      <td style="background-color:' . $bgColor . '">' . $_REQUEST['user'] . '</td>
      <td style="background-color:' . $bgColor . '">' . $_REQUEST['content'] . '</td>
    </tr>
    </table>';
}
?>
<br/>
<form action="02_ablaufkontrolle.php" method="post">
    <table style="margin: 0 auto; width: 350px">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="user" value=""/></td>
        </tr>
        <tr>
            <td>Inhalt:</td>
            <td><input type="text" name="content" value=""/></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="shout" value="rufen"/>
            </td>
        </tr>
    </table>
</form>