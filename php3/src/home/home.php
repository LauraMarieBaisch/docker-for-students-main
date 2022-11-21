<?php
session_start();
include_once("../../src/db/DBConnector.php");
include_once("../../www/html/header.php");
?>
<body>
<div class="main">
    <h1>Rezepte:</h1>

    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
        $dbConnection = new DBConnector();
        $sqlQuery = "SELECT * FROM recipes";
        $results = $dbConnection->getConnection()->query($sqlQuery, PDO::FETCH_ASSOC);
        if (isset($results)) {
            foreach ($results as $result) {
                echo "<tr> 
                        <td>$result[recipe_id]</td> 
                        <td>$result[title]</td> 
                        <td>$result[description]</td>  
                        <td>
                        <a href='../../src/show/showRecipe.php?Recipe_id=$result[recipe_id]'>Show</a>
                        </td>
                        <td>
                        <a href='../../src/change/changeRecipe.php?Recipe_id=$result[recipe_id]'>Change</a>
                        </td>
                        <td>
                        <a href='../../src/delete/deleteRecipe.php?Recipe_id=$result[recipe_id]'>Delete</a>
                        </td>
                    </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
<?php include_once("../../www/html/footer.html");