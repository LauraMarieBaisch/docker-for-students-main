<?php
session_start();

// Wenn User bereits eingeloggt ist -> Startseite aufrufen
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: http://localhost/src/home/home.php");
    exit;
}

if (isset($_POST["login"])) {
    require_once("../db/DBConnector.php");
    $dbConnection = (new DBConnector())->getConnection();
    $stmt = $dbConnection->prepare("SELECT * FROM accounts WHERE username = :user"); //Username überprüfen
    $stmt->bindParam(":user", $_POST["username"]); //Platzhalter
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        //Username ist frei, weil ein Datensatz gefunden;
        $row = $stmt->fetch();
        if (password_verify($_POST["password"], $row["password"])) {

            // Wenn Login erfolgreich -> Startseite ausgeben
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['userId'] = $row['id'];
            $_SESSION['user'] = $row['username'];
            header("Location: http://localhost/src/home/home.php");
        } else {
            echo "Der Login ist fehlgeschlagen";
        }
    } else {
        echo "Kein Account zum Username gefunden";
    }
}
include_once('../../www/html/header.php')
?>
    <div class="loginPage">
        <form method="post">
            <div class="loginContainer">
                <label for="uname"><b>Benutzername</b></label>
                <input type="text" placeholder="Benutzernamen" name="username" required>

                <label for="psw"><b>Passwort</b></label>
                <input type="password" placeholder="Passwort" name="password" required>

                <button type="submit" name="login">Einloggen</button>
                <button type="button" class="cancelBtn">Abbrechen</button>
            </div>
        </form>
    </div>
        <div class="registerContainer">
            <div>
                <h1>Neu hier?</h1>
                <p>Dann registrieren Sie sich jetzt! Als registriertes Mitglied haben Sie die Möglichkeit, eigene Rezepte zu erstellen, zu kommentieren und zu Bewerten.</p>
            </div>
            <button type="button" class="registerbtn" onclick="window.location.href = '../register/register.php'">Registrieren</button>
        </div>
    </div>
<?php include_once('../../www/html/footer.html')?>