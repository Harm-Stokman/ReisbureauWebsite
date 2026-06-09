<?php

include_once 'includes/pdo.php';

if (isset($_POST['submit'])) {

header('Location: admin.php');

    if ($_POST['strandzon'] == null) {
        $_POST['strandzon'] = 0;
    }

    if ($_POST['stedentrip'] == null) {
        $_POST['stedentrip'] = 0;
    }

    if ($_POST['wintersport'] == null) {
        $_POST['wintersport'] = 0;
    }

    if ($_POST['natuur'] == null) {
        $_POST['natuur'] = 0;
    }

    if ($_POST['cultuur'] == null) {
        $_POST['cultuur'] = 0;
    }

    $sqltoevoegen = "INSERT INTO Reizen (Bestemming, Land, korte_beschrijving, Prijs, Vlag, Continent, Strand_en_zon, 
Stedentrip, Wintersport, Natuur, Cultuur, Welkom_bericht, Historie, Wat_te_doen, Achtergrond, kaart_afbeelding)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

    $addstatement = $pdo->prepare($sqltoevoegen);
    $addstatement->bindParam(1, $_POST['bestemming']);
    $addstatement->bindParam(2, $_POST['land']);
    $addstatement->bindParam(3, $_POST['beschrijving']);
    $addstatement->bindParam(4, $_POST['prijs']);
    $addstatement->bindParam(5, $_POST['vlag']);
    $addstatement->bindParam(6, $_POST['continent']);
    $addstatement->bindParam(7, $_POST['strandzon']);
    $addstatement->bindParam(8, $_POST['stedentrip']);
    $addstatement->bindParam(9, $_POST['wintersport']);
    $addstatement->bindParam(10, $_POST['natuur']);
    $addstatement->bindParam(11, $_POST['cultuur']);
    $addstatement->bindParam(12, $_POST['welkomstbericht']);
    $addstatement->bindParam(13, $_POST['historie']);
    $addstatement->bindParam(14, $_POST['wattedoen']);
    $addstatement->bindParam(15, $_POST['achtergrond']);
    $addstatement->bindParam(16, $_POST['kaartafbeelding']);

    $addstatement->execute();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <header>
            <img src="img/logo-vaygo.png" alt="logo Vaygo">

            <?php
            include_once 'includes/header.php';
            ?>
        </header>

        <div class="user-actions">
            <span class="title-block">
                Reis toevoegen
            </span>
            <a href="admin.php"><button class="action-button">Terug</button></a>
            <form class="userform" method="post">
                <div>
                    <input type="text" name="bestemming" placeholder="Bestemming">
                    <input type="text" name="land" placeholder="Land">
                    <textarea rows="1" name="beschrijving" placeholder="Korte beschrijving"></textarea>
                    <input type="number" name="prijs" placeholder="Prijs">
                    <select type="text" name="continent">
                        <option value="Continent">Continent...</option>
                        <option value="Noord-Amerika">Noord-Amerika</option>
                        <option value="Zuid-Amerika">Zuid-Amerika</option>
                        <option value="Europa">Europa</option>
                        <option value="Azië">Azië</option>
                        <option value="Afrika">Afrika</option>
                        <option value="Oceanië">Oceanië</option>
                    </select>
                    <label>Strand en zon</label>
                    <input type="checkbox" name="strandzon" value="1">
                    <label>Stedentrip</label>
                    <input type="checkbox" name="stedentrip" value="1">
                    <label>Wintersport</label>
                    <input type="checkbox" name="wintersport" value="1">
                    <label>Natuur</label>
                    <input type="checkbox" name="natuur" value="1">
                    <label>Cultuur</label>
                    <input type="checkbox" name="cultuur" placeholder="Cultuur" value="1">
                    <textarea rows="1" name="welkomstbericht" placeholder="Welkomstbericht"></textarea>
                    <textarea rows="1" name="historie" placeholder="Historie"></textarea>
                    <textarea rows="1" name="wattedoen" placeholder="Wat te doen"></textarea>
                    <input type="text" name="vlag" placeholder="Vlag">
                    <input type="text" name="achtergrond" placeholder="Achtergrond">
                    <input type="text" name="kaartafbeelding" placeholder="Kaart-afbeelding">
                </div>
                <input class="action-button" type="submit" name="submit" value="Toevoegen">
            </form>
        </div>
    </main>
</body>

</html>