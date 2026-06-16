<?php

session_start();
include_once 'includes/pdo.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraag het Vaygo</title>
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

    <div class="user-actions">
        <span class="title-block">
            Vraag het Vaygo
        </span>
        <form class="userform">
            <div>
                <input type="email" name="email" placeholder="Uw E-mailadres">
                <input type="text" name="title" placeholder="Onderwerp">
                <textarea rows="1" name="message" placeholder="Stel uw vraag.."></textarea>
            </div>
            <input class="action-button" type="submit" name="submit" value="Verzenden">
        </form>
    </div>


    <main>

    </main>

</body>

</html>
