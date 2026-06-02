<?php
session_start();
include_once 'includes/pdo.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM Gebruikers 
        WHERE Gebruikersnaam = ?";

        $userstatement = $pdo->prepare($query);
        $userstatement->bindParam(1, $username);
        $userstatement->execute();
        $user = $userstatement->fetch();

        if ($userstatement->rowCount() > 0) {
            if ($username == $user['Gebruikersnaam'] && $password == $user['Wachtwoord']) {
                $_SESSION['user-id'] = $user['User-id'];
                $_SESSION['logged-in'] = true;
                 header('Location: index.php');
            }
        } echo "Verkeerde gegevens";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&display=swap"
        rel="stylesheet">
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
                Inloggen
            </span>
            <form class="userform" method="post">
                <div>
                    <input type="text" name="username" placeholder="Gebruikersnaam" require>
                    <input type="password" name="password" placeholder="Wachtwoord" require>
                </div>
                <input class="action-button" type="submit" name="submit" value="Login">
            </form>
            <div class="form-alt">
                <span>
                    Geen account?
                </span>
                <a href="signup.php"><button>Aanmelden</button></a>
            </div>
        </div>
    </main>
</body>

</html>
