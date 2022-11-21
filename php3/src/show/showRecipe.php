<?php
session_start();
include_once("../../src/db/DBConnector.php");
include_once("../../www/html/header.php");
?>

<body>
<div class="main">
    <h1>Rezept</h1>
    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Rating</th>
            <th>Level</th>
        </tr>
        <?php
            if (isset($_GET['Recipe_id'])) {
                $dbConnection = (new DBConnector())->getConnection();
                $stmt = $dbConnection->prepare("SELECT * FROM recipes WHERE recipe_id = :Recipe_id");
                $stmt->bindParam(":Recipe_id", $_GET["Recipe_id"]);
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count == 1) {
                //Rezept vorhanden, weil ein Datensatz gefunden;
                $row = $stmt->fetch();
                echo "
                <tr> 
                    <td>$row[recipe_id]</td> 
                    <td>$row[title]</td> 
                    <td>$row[description]</td>
                    <td>$row[rating]</td>
                    <td>$row[level]</td>
                </tr>
                ";
                }   
            }
        ?>
    </table>
    <!--Zutatenliste-->
    <h3>Zutaten</h3>
    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Menge</th>
        </tr>
        <?php
        if(isset($_GET['Recipe_id'])) { 
            $dbConnection = (new DBConnector())->getConnection();
            $stmt = $dbConnection->prepare("SELECT * FROM ingredients WHERE recipe_id = :Recipe_id");
            $stmt->bindParam(":Recipe_id", $_GET["Recipe_id"]);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $results = $stmt->fetchAll();
            if (isset($results)) {
                foreach ($results as $result) {
                    echo "<tr> 
                        <td>$result[recipe_id]</td> 
                        <td>$result[name]</td> 
                        <td>$result[menge]</td>
                    </tr>";
                }
            }
        }
        ?>
    </table>
</div>
</body>

<?php include_once("../../www/html/footer.html");