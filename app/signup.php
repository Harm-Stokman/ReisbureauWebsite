<?php
session_start();
include_once 'includes/pdo.php';

if (isset($_POST['submit'])) {

    if ($_POST['username'] !== "Admin" && $_POST['username'] !== "admin") {
        $usermail = $_POST['email'];

        $sqlusercheck = "SELECT * FROM Gebruikers WHERE Emailadres = ?";
        $usercheck = $pdo->prepare($sqlusercheck);
        $usercheck->bindParam(1, $usermail);
        $usercheck->execute();
        $checkresult = $usercheck->fetchAll();

        if ($usercheck->rowCount() == 0) {
            if ($_POST['passwordcheck'] == $_POST['password']) {

                $sqluseradd = "INSERT INTO Gebruikers (`Gebruikersnaam`, `Emailadres`, `Wachtwoord`) VALUES (?, ?, ?)";

                $useradd = $pdo->prepare($sqluseradd);
                $useradd->bindParam(1, $_POST['username']);
                $useradd->bindParam(2, $_POST['email']);
                $useradd->bindParam(3, $_POST['password']);
                $useradd->execute();
                header('Location: index.php');
            } else {
                echo "Wachtwoorden komt niet overeen";
            }
        } else {
            echo "Dit E-mailadres is al in gebruik.";
        }
    } else {
        echo "Ongeldige gebruikersnaam.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelden</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <img src="img/logo-vaygo.png" alt="logo Vaygo">
        <?php
        include_once 'includes/header.php';
        ?>
    </header>
    <main>

        <div class="user-actions">
            <span class="title-block">
                Aanmelden
            </span>
            <form class="userform" method="post">
                <div>
                    <input type="text" name="username" placeholder="Uw gebruikersnaam" required>
                    <input type="email" name="email" placeholder="Uw E-mailadres" required>
                    <input type="password" name="password" placeholder="Wachtwoord" required>
                    <input type="password" name="passwordcheck" placeholder="Wachtwoord herhalen" required>
                </div>
                <input class="action-button" type="submit" name="submit" value="Aanmelden">
            </form>
            <div class="form-alt">
                <span>
                    Al een account?
                </span>
                <a href="inlog.php"><button>Login</button></a>
            </div>
            <div class="search-button"><a href="privacypolicy.php">Privacy policy</a></div>
        </div>
    </main>
</body>

</html>
