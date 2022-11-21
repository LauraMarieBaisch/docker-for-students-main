<?php
include_once("../../www/html/header.php");
include_once("../../src/db/DBConnector.php");
include_once("RecipeController.php");
session_start();
if ($_GET['Recipe_id']) {
    if (isset($_GET['Recipe_id'])) {
        $dbConnection = (new DBConnector())->getConnection();
        $stmt = $dbConnection->prepare("SELECT * FROM recipes WHERE recipe_id = :Recipe_id");
        $stmt->bindParam(":Recipe_id", $_GET["Recipe_id"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
        //Rezept vorhanden, weil ein Datensatz gefunden;
        $row = $stmt->fetch();
        $recipeId = $row['recipe_id']; 
        $recipeName = $row['title'];
        $recipeDescription = $row['description'];
        $recipeRating = $row['rating'];
        $recipeLevel = $row['level'];
        
        if ($row['account_id'] !== $_SESSION['userId']) {
            header("location: http://localhost/src/delete/deleteRecipe.php?Recipe_id=$recipeId");
            exit;
        }   
        }
    }
}
?>
<script type="text/javascript">
    console.log("test");
    $(document).ready(function () {
        let i = 0;
        $('#addIngredients').click(function () {
            i++;
            $('#ingredients').append(
                '<tr id="row'+i+'">' +
                '<td>' +
                '<input type="text" name="ingredient[]" placeholder="Ingredient name" class="form-control name_list"/>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="quantity[]" placeholder="Quantity" class="form-control name_list"/>' +
                '</td>' +
                '</tr>')
        })
    })
</script>
<body>
<section class="changeRecipeBody">
    <div class="changeRecipePage">
            <h1>Rezept anpassen: </h1>
            <br>
            <form action="changeRecipeProxy.php" method="post">

                <!--
                <label for="userId"><b>User Id:</b></label>
                <input disabled id="userId" name="userId" type="text" value="<?php //echo $_SESSION['userId']?>">
-->
                <input id="recipeId" name="recipeId" type="hidden" value="<?php echo $recipeId?>">

                <label for="recipeName"><b>Name:</b></label>
                <input id="recipeName" type="text" value="<?php echo $recipeName;?>" name="recipeName" maxlength="20"
                       required/>

                <br>
                <br>

                <label for="rating"><b>Bewertung: &nbsp</b></label>
                <select name="rating" id="rating">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>

                <br>
                <br>

                <label for="difficulty"><b>Schwierigkeitsgrad: &nbsp</b></label>
                <select id="difficulty" name="difficulty">
                    <option value="leicht">Leicht</option>
                    <option value="mittel">Mittel</option>
                    <option value="schwer">Schwer</option>
                </select>

                <br>
                <br>

                <label for="addIngredients"><b>Zutaten:</b></label>
                <button type="button" id="addIngredients">Hinzufügen</button>

                <table id="ingredients">

                </table>


                <label for="description"><b>Beschreibung:</b></label>
                <input id="description" type="text" placeholder="Beschreibung einfügen" name="description" value="<?php echo $recipeDescription?>" required>

                <br>
                <br>
                <button type="submit" name="addRecipe">Rezept anpassen</button>
                <button type="reset" class="cancelBtn" onclick="window.location.href = '../../src/home/home.php'">
                    Abbrechen
                </button>
            </form>

        </div>
    </div>
</section>
</body>


