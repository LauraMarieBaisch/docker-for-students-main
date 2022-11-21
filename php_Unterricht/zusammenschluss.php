<?php
#######################################################################
# includes
#######################################################################
require_once 'functions.php';

#######################################################################
# main
#######################################################################
// Did we receive user and content data?
if (!empty($_REQUEST['user']) && !empty($_REQUEST['content'])) {
    // Write another shout to file
    $shout = new Shout($_REQUEST['user'], $_REQUEST['content']);
    $shout->save();
}

#######################################################################
# output
#######################################################################
Shout::listShouts();

echo '
<br />
<form action="' . $_SERVER['SCRIPT_NAME'] . '" method="post">
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
</form>';