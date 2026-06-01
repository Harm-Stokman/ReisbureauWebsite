<?php
session_start();
include_once 'includes/pdo.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schrijf een review!</title>
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
            Schrijf een review!
        </span>
        <form class="userform">
            <div>
                <textarea rows="1" name="message" placeholder="Uw review"></textarea>
            </div>
             <input class="action-button" type="submit" name="submit" value="Verzenden">
        </form>
    </div>
    </main>
</body>

</html>