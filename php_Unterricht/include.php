<?php

require_once '04_functions.php';


// main

// Did we receive user and content data?
if (!empty($_REQUEST['user']) && !empty($_REQUEST['content'])) {
    save($_REQUEST['user'], $_REQUEST['content']);
}


// output
// Read shout file
$file = fopen('shouts.txt', 'r');
if ($file) {
    // Display shout output in table
    echo '
    <table style="border-spacing: 2px; margin: 0 auto; width: 350px">';
    while (!feof($file)) {
        echo fgets($file);
    }
    //echo file_get_contents( $fileName );
    echo '
    </table>';
}
?>
<br/>
<form action="04_include.php" method="post">
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