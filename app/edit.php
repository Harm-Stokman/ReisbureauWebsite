<?php

session_start();
include_once 'includes/pdo.php';

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis bewerken</title>
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
                Reis toevoegen
            </span>
            <form class="userform">
                <div>
                    <input type="text" name="bestemming" placeholder="Bestemming">
                    <input type="text" name="land" placeholder="Land">
                    <textarea rows="1" name="beschrijving" placeholder="Korte beschrijving"></textarea>
                    <input type="text" name="prijs" placeholder="Prijs">
                    <input type="text" name="afbeelding" placeholder="Afbeelding">
                    <select type="text" name="continent">
                        <option value="Continent">Continent...</option>
                        <option value="Noord-Amerika">Noord-Amerika</option>
                        <option value="Zuid-Amerika">Zuid-Amerika</option>
                        <option value="Europa">Europa</option>
                        <option value="Azië">Azië</option>
                        <option value="Afrika">Afrika</option>
                        <option value="Oceanië">Oceanië</option>
                    </select>
                    <input type="checkbox" id="strandzon" name="strandzon" value="1">
                    <input type="checkbox" name="stedentrip" placeholder="Stedentrip" value="1">
                    <input type="checkbox" name="wintersport" placeholder="Wintersport" value="1">
                    <input type="checkbox" name="natuur" placeholder="Natuur" value="1">
                    <input type="checkbox" name="cultuur" placeholder="Cultuur" value="1">
                    <textarea rows="1" name="welkomstbericht" placeholder="Welkomstbericht"></textarea>
                    <textarea rows="1" name="historie" placeholder="Historie"></textarea>
                    <textarea rows="1" name="wattedoen" placeholder="Wat te doen"></textarea>
                </div>
                <input class="action-button" type="submit" name="submit" value="Bewerken">
            </form>
        </div>
    </main>
</body>

</html>