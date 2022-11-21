<?php error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sip Sip Hurray</title>
    <link rel="stylesheet" href="../../stylesheet.css">
    <script type="text/javascript" src="../../index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<div class="header">
    <div class="navigationMenu">
        <div class="navigationMenuLogo">
            <a href="../../src/home/home.php">
                <img src="../../img/drink.png" width=140 px>
            </a>
        </div>
        <nav class="navMenu">
            <!-- Hier kommen die Menüpunkte hin -->
            <a href="../../src/home/home.php">Startseite</a>
            <a href="../../src/recipe/addrecipe.php">Eigenes Rezept erstellen</a>
            <a href="../../src/about/aboutUs.php">About us</a>
        </nav>
        <div class="navigationMenuButton">
            <div class="navigationMenuButtonAnmelden">
                <button onclick="window.location.href = '../../src/login/login.php'">Anmelden</button>
            </div>
            <div class="navigationMenuButtonRegistrieren">
                <button onclick="window.location.href = '../../src/register/register.php'">Registrieren</button>
            </div>
            <div class="navigationMenuButtonRegistrieren">
                <button onclick="window.location.href = '../../src/login/logout.php'">Abmelden</button>
            </div>
        </div>
    </div>
</div>