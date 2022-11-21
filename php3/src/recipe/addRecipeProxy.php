<?php
session_start();
$recipeName = $_POST['recipeName'];
$timeExpenditure = $_POST['timeExpenditure'];
$rating = $_POST['rating'];
$difficulty = $_POST['difficulty'];
$description = $_POST['description'];
$user = $_SESSION['userId'];
include_once('../db/DBConnector.php');


$dbConnection = (new DBConnector())->getConnection();
if ($user != null) {

    $stmt = $dbConnection->prepare("INSERT INTO recipes (title, account_id, description, rating, level) 
            VALUES (:title, :accountId, :description, :rating, :level)");

    $stmt->bindParam(":title", $recipeName);
    $stmt->bindParam(":accountId", $user);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":level", $difficulty);

    $stmt->execute();

    $lastInsertId = null;
    $lastInsertId = $dbConnection->lastInsertId();
    if ($lastInsertId !== null) {
        var_dump(count($_POST['ingredient']));
        for ($i = 0; $i < count($_POST['ingredient']); $i++) {
            if ($_POST['ingredient'][$i] !== null && $_POST['quantity'][$i] !== null) {
                $stmt = $dbConnection->prepare("INSERT INTO ingredients (recipe_id, name, menge) VALUES (:recipeId, :name, :menge)");
                $stmt->bindParam(":recipeId", $lastInsertId);
                $stmt->bindParam(":name", $_POST['ingredient'][$i]);
                $stmt->bindParam(":menge", $_POST['quantity'][$i]);
                $stmt->execute();
            }
        }
    }
}
header("location: http://localhost/src/home/home.php");
?>

