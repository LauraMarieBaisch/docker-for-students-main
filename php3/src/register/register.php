<?php
//session_start();

if (isset($_POST['registrieren'])) {
    require_once('../db/DBConnector.php');
    $dbConnection = (new DBConnector())->getConnection();
    $stmt = $dbConnection->prepare("SELECT * FROM accounts WHERE username = :user");
    $stmt->bindParam(':user', $_POST['username']);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
        //Username ist frei
        if ($_POST['password'] === $_POST['password2']) {
            //User anlegen
            $query = "INSERT INTO accounts (username, password, firstName, lastName) VALUES (:user, :pw, :firstName, :lastName)";
            $stmt = $dbConnection->prepare($query);
            $stmt->bindParam(':user', $_POST['username']);
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':pw', $hash);
            $stmt->bindParam(':firstName', $_POST['firstName']);
            $stmt->bindParam(':lastName', $_POST['lastName']);
            $stmt->execute();
            echo "Dein Account wurde angelegt";
        } else {
            echo "Die Passwörter stimmen nicht überein";
        }
    } else {
        echo "Der Username ist bereits vergeben";
    }
}
include_once('../../www/html/header.php')
?>

<body>
<section class="registrationBody">
    <div class="registrationPage">
        <form method="post" action="register.php">
            <div class="registrationContainer">
                <h1>Registriere dich hier: </h1>
                <br>
                <br>

                <label for="firstname"><b>Vorname:</b></label>
                <input id="firstname" type="text" placeholder="Vorname" name="firstName" required>

                <label for="lastname"><b>Nachname:</b></label>
                <input id="lastname" type="text" placeholder="Nachname" name="lastName" required>

                <label for="uname"><b>Benutzername:</b></label>
                <input id="uname" type="text" placeholder="Benutzernamen" name="username" required>

                <label for="psw"><b>Passwort:</b></label>
                <input id="psw" type="password" placeholder="Passwort" name="password" required>

                <label for="psw2"><b>Passwort erneut eingeben:</b></label>
                <input id="psw2" type="password" placeholder="Passwort wiederholen" name="password2" required>

                <br>
                <br>
                <button type="submit" name="registrieren">Jetzt registrieren</button>
                <button type="button" class="cancelbtn" onclick="window.location.href = 'index.php?page=home'">
                    Abbrechen
                </button>
            </div>
        </form>
        <div class="loginContainer">
            <h1>Bereits registriert?</h1>
            <p>Dann melden Sie sich jetzt an!</p>
            <button type="button" class="loginbtn" onclick="window.location.href = '../login/login.php'">Anmelden
            </button>
        </div>
    </div>
</section>
<?php include_once('../../www/html/footer.html')?>
</body>