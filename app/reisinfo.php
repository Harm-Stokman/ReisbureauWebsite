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



    <main>
        <div class="box-info">
            <div class="all-bestemming-info" style="--background_img: url('../img/willemstad.png');">   <!-- Image changes depending on ID -->
                <div class="bestemming-info-header">
                    <img src="img/Curacao.png" alt="Bestemming vlag">
                    <span class="title-block-continent">Noord-Amerika</span>
                    <span class="title-block-alt">Willemstad, Curacao</span>
                    <div class="label-box-alt">
                        <div class="index-label">Strand en zon</div>
                        <div class="index-label">Stedentrip</div>
                    </div>
                </div>
            </div>
            <div class="location-info">
                <div class="info-block">
                    <span class="title-block">Welkom in Willemstad</span>
                    <p>Welkom in Willemstad, het bruisende hart van Curaçao. Zodra je aankomt, word je omringd door kleurrijke gebouwen, een aangenaam klimaat en een ontspannen Caribische sfeer. De stad combineert Nederlandse architectuur met tropische invloeden, wat zorgt voor een unieke uitstraling die je nergens anders vindt. Wandel langs de beroemde waterkant, ontdek gezellige straatjes en geniet van de lokale cultuur. Of je nu komt voor een ontspannen vakantie, mooie foto's of het ontdekken van een nieuwe cultuur, Willemstad heeft voor iedere reiziger iets bijzonders te bieden. Wij zorgen ervoor dat jouw reis naar deze prachtige bestemming soepel begint met een comfortabele vlucht naar Curaçao.</p>
                </div>
                <div class="info-block">
                    <span class="title-block">Geschiedenis</span>
                    <p>De geschiedenis van Willemstad begon in 1634, toen de Nederlanders zich op Curaçao vestigden en een handelsnederzetting opbouwden rond een natuurlijke haven. Door de gunstige ligging groeide de stad uit tot een belangrijk handelscentrum in het Caribisch gebied. In de eeuwen daarna ontstonden verschillende wijken, zoals Punda en Otrobanda, die nog steeds het historische karakter van de stad bepalen. De Nederlandse invloeden zijn vandaag de dag duidelijk zichtbaar in de architectuur. Dankzij de goed bewaarde binnenstad en haven werd Willemstad in 1997 opgenomen op de Werelderfgoedlijst van UNESCO.</p>
                </div>
                <div class="info-block">
                    <span class="title-block">Wat te doen</span>
                    <p>Willemstad biedt genoeg mogelijkheden voor een afwisselende vakantie. Bezoekers kunnen wandelen door de historische wijken Punda en Otrobanda, waar kleurrijke gebouwen en gezellige pleinen het straatbeeld bepalen. Ook de beroemde Koningin Emmabrug is een populaire bezienswaardigheid. Daarnaast zijn er diverse musea, winkels, restaurants en markten te vinden in de stad. Vanuit Willemstad zijn ook verschillende stranden gemakkelijk bereikbaar, waardoor een dag cultuur perfect gecombineerd kan worden met ontspanning aan zee. Of je nu houdt van geschiedenis, architectuur, winkelen of gewoon genieten van de Caribische sfeer, Willemstad heeft voor iedereen iets te bieden. </p>
                </div>
            </div>
            <a href="boeken.php"><button class="action-button">Boek nu!</button></a>
        </div>
    </main>



    <footer>
        
    <?php
    include_once 'includes/footer.php';
    ?>
    </footer>

</body>

</html>
