<?php 

session_start();
include_once 'includes/pdo.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        <div class="about-us">
            <div class="about-us-block">
                <span class="title-block">Wat is Vaygo</span>
                <div class="text-box">
                    <p>Vaygo is een modern Nederlands vluchtplatform gevestigd in Amsterdam, opgericht in 2026 met één duidelijke focus: vliegen eenvoudiger maken. Wij helpen reizigers wereldwijd snel en overzichtelijk vluchten boeken naar bestemmingen over de hele wereld zonder onnodige extra’s of ingewikkelde stappen.</p>
                    <p>Bij Vaygo geloven we dat het boeken van een vlucht simpel, transparant en betrouwbaar moet zijn. Daarom richten wij ons volledig op vliegreizen en houden we onze website overzichtelijk en gebruiksvriendelijk. Geen, geen verborgen kosten, alleen duidelijke keuzes en eerlijke prijzen.</p>
                </div>
            </div>

            <img src="img/plane1.png" alt="plane image">

            <div class="about-us-block">
                <span class="title-block">Hoe zijn we begonnen</span>
                <div class="text-box">
                    <p>Vaygo is ontstaan vanuit het idee dat veel reiswebsites onnodig ingewikkeld zijn geworden. Tussen hotels, huurauto’s, pakketreizen en extra kosten raakt het boeken van een simpele vlucht vaak onoverzichtelijk.</p>
                    <p>Daarom hebben wij gekozen voor een andere aanpak: een platform dat volledig gericht is op vliegtickets. Door ons te focussen op één onderdeel van reizen kunnen wij een snelle, moderne en eenvoudige ervaring bieden aan iedereen die zonder gedoe de wereld wil ontdekken.</p>
                </div>
            </div>

            <img src="img/vliegveld1.png" alt="vliegveld image">

            <div class="about-us-block">
                <span class="title-block">We staan voor:</span>
                <div class="text-box">
                    <span class="about-us-title">Eenvoud</span>
                    <p>Wij geloven dat reizen begint met een soepele boekingservaring. Onze website is ontworpen om snel, duidelijk en makkelijk te gebruiken te zijn.</p>
                    <span class="about-us-title">Transparantie</span>
                    <p>Bij Vaygo weet je waar je aan toe bent. Geen verborgen kosten of onverwachte toeslagen tijdens het boeken.</p>
                    <span class="about-us-title">Wereldwijd Reizen</span>
                    <p>Van Europese steden tot verre internationale bestemmingen, wij verbinden reizigers met locaties over de hele wereld.</p>
                    <span class="about-us-title">Een Focus</span>
                    <p>Wij doen een ding en dat doen we goed. Geen treinen, hotels of andere reisdiensten. Vaygo richt zich volledig op vluchten.</p>
                    <span class="about-us-title">Modern Reizen</span>
                    <p>Reizen verandert voortdurend, en wij groeien mee. Met een moderne aanpak en gebruiksvriendelijk platform willen we vliegen toegankelijk maken voor iedereen.</p>
                </div>
            </div>

        </div>
    </main>



    <footer>
        
    <?php
    include_once 'includes/footer.php';
    ?>
    </footer>

</body>

</html>
