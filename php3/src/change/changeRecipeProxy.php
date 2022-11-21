<?php
session_start();
$recipeId = $_POST['recipeId'];
$recipeName = $_POST['recipeName'];
$rating = $_POST['rating'];
$difficulty = $_POST['difficulty'];
$description = $_POST['description'];
$user = $_SESSION['userId'];
include_once('../db/DBConnector.php');


$dbConnection = (new DBConnector())->getConnection();
if ($user != null) {

    $stmt = $dbConnection->prepare("UPDATE recipes set title = :title, description = :description, rating = :rating, level = :level 
                                    WHERE recipe_id = :Recipe_id");
    print_r($recipeId);
    $stmt->bindParam(":Recipe_id", $recipeId);
    $stmt->bindParam(":title", $recipeName);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":level", $difficulty);

    $stmt->execute();

    if ($recipeId !== null) {
        $stmt = $dbConnection->prepare("DELETE FROM ingredients WHERE recipe_id = :Recipe_id");
        $stmt->bindParam(":Recipe_id", $recipeId);
        $stmt->execute();
        if ($_POST['ingredient'] == null) {
            header("location: http://localhost/src/home/home.php");
            exit;
        }
        var_dump(count($_POST['ingredient']));
        for ($i = 0; $i < count($_POST['ingredient']); $i++) {
            if ($_POST['ingredient'][$i] !== null && $_POST['quantity'][$i] !== null) {
                    $stmt2 = $dbConnection->prepare("INSERT INTO ingredients (recipe_id, name, menge) VALUES (:recipeId, :name, :menge)");
                    $stmt2->bindParam(":recipeId", $recipeId);
                    $stmt2->bindParam(":name", $_POST['ingredient'][$i]);
                    $stmt2->bindParam(":menge", $_POST['quantity'][$i]);
                    $stmt2->execute();
            }
        }
    }
}
header("location: http://localhost/src/home/home.php");
?>

