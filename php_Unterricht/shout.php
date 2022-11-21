<?php
// Did we receive user and content data?
if (!empty($_REQUEST['user']) && !empty($_REQUEST['content'])) {

    // Define shout output color
    switch ($_REQUEST['user']) {
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

    // Write another shout to file
    $file = fopen('shouts.txt', 'a');
    if ($file) {
        $zeile = '
        <tr>
          <td style="background-color:' . $bgColor . '">' . $_REQUEST['user'] . '</td>
          <td style="background-color:' . $bgColor . '">' . $_REQUEST['content'] . '</td>
        </tr>';
        fwrite($file, $zeile);
        fclose($file);
    } else {
        echo 'Datei nicht schreibbar!';
    }

}

// Read shout file
$file = fopen('shouts.txt', 'r');
if ($file) {
    // Display shout output in table
    echo '
    <table style="border-spacing: 2px; margin: 0 auto; width: 350px">';
    while (!feof($file)) {
        echo fgets($file);
    }
//    echo file_get_contents( 'shouts.txt' );
    echo '
    </table>';
}

class Shout {
    public function __construct($user, $content) {} public function save() {}
    static public function listShouts() {}
    }
?>
<br/>
<form action="03_dateien.php" method="post">
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