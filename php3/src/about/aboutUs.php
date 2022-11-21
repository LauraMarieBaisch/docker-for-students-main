<?php
include_once("../../www/html/header.php");
include_once("RecipeController.php");
session_start();
?>

<body>
        <div class="aboutUs">
            <div class="introductionText">
                <h1>About us</h1>
                <h6>Neugierig wer hinter dieser krassen Seite für außergewöhliche Cocktails steckt? Schau´s dir an.</h6>
            </div>
            
            <div class="galleryAboutUs">
                <div class="aboutUsItems">
                    <figure>
                        <img src="../../img/laura.JPG" width=200px>
                        <figcaption>Laura</figcaption>
                    </figure>
                    <figure>
                        <img src="../../img/anna.jpg" width=200px>
                        <figcaption>Anna</figcaption>
                    </figure>
                    <figure>
                        <img src="../../img/ante.jpg" width=200px>
                        <figcaption>Ante</figcaption>
                    </figure>
                </div>
            </div>
        </div>
</body>
<?php include_once("../../www/html/footer.html");