<?php

session_start();
include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis informatie</title>
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

    <?php

    $sqlreis = "SELECT * FROM Reizen WHERE Reis_id = ?";

    $reisstatement = $pdo->prepare($sqlreis);   // Maak verbinding met de database en bereid de SQL statement voor
    $reisstatement->bindParam(1, $_GET['id']);  // Krijg ID van de link waar je op hebt geklikt (bindParam als placeholder)
    $reisstatement->execute();                  // Voer de SQL statement uit
    
    $reis = $reisstatement->fetch();

    ?>

    <main>
        <div class="box-info">
            <div class="all-bestemming-info" style="--background_img: url('../img/<?php echo $reis['kaart_afbeelding'] ?>');">
                <!-- Image changes depending on ID -->
                <div class="bestemming-info-header">
                    <img src="img/<?php echo $reis['Vlag'] ?>" alt="Bestemming vlag">
                    <span class="title-block-continent"><?php echo $reis['Continent'] ?></span>
                    <span class="title-block-alt"><?php echo $reis['Bestemming'] ?>, <?php echo $reis['Land'] ?></span>
                    <div class="label-box-alt">
                        <?php
                        if ($reis['Strand_en_zon'] == 1) {
                            echo "<div class='index-label'>Strand en zon</div>";
                        }
                        if ($reis['Stedentrip'] == 1) {
                            echo "<div class='index-label'>Stedentrip</div>";
                        }
                        if ($reis['Wintersport'] == 1) {
                            echo "<div class='index-label'>Wintersport</div>";
                        }
                        if ($reis['Natuur'] == 1) {
                            echo "<div class='index-label'>Natuur</div>";
                        }
                        if ($reis['Cultuur'] == 1) {
                            echo "<div class='index-label'>Cultuur</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="location-info">
                <div class="info-block">
                    <span class="title-block">Welkom in <?php echo $reis['Bestemming'] ?></span>
                    <p><?php echo $reis['Welkom_bericht'] ?></php>
                </div>
                <div class="info-block">
                    <span class="title-block">Geschiedenis</span>
                    <p><?php echo $reis['Historie'] ?></p>
                </div>
                <div class="info-block">
                    <span class="title-block">Wat te doen</span>
                    <p><?php echo $reis['Wat_te_doen'] ?></p>
                </div>
            </div>
            <a href="boeken.php? id=<?php echo $reis['Reis_id'] ?>"><button class="action-button">Boek nu!</button></a>
        </div>
        <button class="go-to-top-button" id="goBackToTop" onclick="goToTopFunction()">↑</button>
    </main>

    <footer>

        <?php
        include_once 'includes/footer.php';
        ?>
    </footer>

</body>

</html>
