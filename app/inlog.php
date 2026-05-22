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
            <form class="userform">
                <div class="input-field">
                    <input type="text" name="username" placeholder="Gebruikersnaam">
                    <input type="password" name="password" placeholder="Wachtwoord">
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