<?php
include_once("../../www/html/header.php");
include_once("RecipeController.php");
session_start();
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
<section class="addRecipeBody">
    <div class="addRecipePage">
        <div class="registrationContainer">
            <h1>Eigenes Rezept erstellen: </h1>
            <br>
            <form action="addRecipeProxy.php" method="post">
                <label for="recipeName"><b>Name:</b></label>
                <input id="recipeName" type="text" placeholder="Name des Rezeptes" name="recipeName" maxlength="20"
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
                <input id="description" type="text" placeholder="Beschreibung einfügen" name="description" required>

                <br>
                <br>
                <button type="submit" name="addRecipe">Rezept anlegen</button>
                <button type="reset" class="cancelBtn"onclick="window.location.href = '../../src/home/home.php'">
                    Abbrechen
                </button>
            </form>

        </div>
    </div>
</section>
</body>
<?php include_once("../../www/html/footer.html");


