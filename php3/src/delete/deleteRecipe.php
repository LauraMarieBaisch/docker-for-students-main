<?php
session_start();
include_once("../../src/db/DBConnector.php");
include_once("../../www/html/header.php");
?>

<?php
session_start();
if (isset($_GET['Recipe_id'])) {
    $dbConnection = (new DBConnector())->getConnection();
    $stmt = $dbConnection->prepare("SELECT * FROM recipes WHERE recipe_id = :Recipe_id");
    $stmt->bindParam(":Recipe_id", $_GET["Recipe_id"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
       //Rezept vorhanden, weil ein Datensatz gefunden;
       $row = $stmt->fetch(); 
       if ($row['account_id'] === $_SESSION['userId']) {
        echo "
            <section class='deleteBody'>
            <div class='deletePage'>
            <form method='post'>
            <button type='submit' name='delete'>Rezept löschen</button>
            </form>
            </div>
            </section>
        ";
       } else {
        echo "Rechte zum Bearbeiten/Löschen fehlen!";
       }
    }
}
if (isset($_POST['delete'])) {
    $dbConnection = (new DBConnector())->getConnection();
    $stmt = $dbConnection->prepare("DELETE FROM recipes WHERE recipe_id = :Recipe_id");
    $stmt->bindParam(":Recipe_id", $_GET["Recipe_id"]); 
    $stmt->execute();

    $stmt2 = $dbConnection->prepare("DELETE FROM ingredients WHERE recipe_id = :Recipe_id");
    $stmt2->bindParam(":Recipe_id", $_GET["Recipe_id"]); 
    $stmt2->execute();
    header("location: http://localhost/src/home/home.php");
}
?>

<body>
<div class="main">

</div>
</body>

<?php include_once("../../www/html/footer.html");