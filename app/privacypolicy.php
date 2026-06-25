<?php

session_start();
include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy policy</title>
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
        <div class="privacy-policy">
            <span class="title-block">Vaygo's policy</span>
            <div class="last-update">
                <span class="about-us-title">Laatste update aan onze policy</span>
                <p>Vrijdag 12 juni 2026 om 12:28</p>
            </div>
            <div class="info-policy">
                <span class="title-block-alt">Informatie die we verzamelen</span>
                <p>Wanneer u onze website bezoekt, verzamelen wij:</p>
                <ul>
                    <li>Uw naam</li>
                    <li>Uw email adres</li>
                    <li>Uw IP adres</li>
                    <li>Uw favoriete dinosaurus</li>
                    <li>Uw grootste angsten</li>
                    <li>Het laatste wat u om drie uur 's nachts heeft gegoogled.</li>
                </ul>
                <p>Als we het kunnen vinden, verzamelen we het.</p>
                <span class="title-block-alt">Hoe gebruiken we uw gegevens</span>
                <p>We gebruiken uw gegevens om:</p>
                <ul>
                    <li>Onze diensten te verbeteren</li>
                    <li>Uw ervaring te personaliseren</li>
                    <li>Uw muziek smaak te beoordelen</li>
                    <li>Onze aandeelhouders tevreden te houden</li>
                </ul>
                <span class="title-block-alt">Delen van gegevens</span>
                <p>Wij kunnen uw gegevens delen met:</p>
                <ul>
                    <li>Vertrouwde bedrijven </li>
                    <li>Onbetrouwbare bedrijven</li>
                    <li>Vreemdelingen in de bus</li>
                    <li>Aliens die marktonderzoek uitvoeren</li>
                    <li>De hoogste bieder</li>
                </ul>
                <span class="title-block-alt">Cookies</span>
                <p>Onze website gebruikt cookies. Echte koekjes.</p>
                <p>Elke keer dat u onze website bezoekt, eet een medewerker namens u een cookie. Dit helpt ons om de website optimaal te laten functioneren en houdt de sfeer op kantoor goed.</p>
                <p>Alvast bedankt voor uw medewerking.</p>
                <span class="title-block-alt">Beveiliging van gegevens</span>
                <p>Wij beschermen uw gegevens met:</p>
                <ul>
                    <li>Wachtwoorden</li>
                    <li>Firewalls</li>
                    <li>Positief denken</li>
                    <li>Een zeer agresieve gans die onze servers bewaakt</li>
                </ul>
                <p></p>
                <span class="title-block-alt">Uw rechten</span>
                <p>U heeft het recht om:</p>
                <ul>
                    <li>Uw gegevens op te vragen</li>
                    <li>Uw gegevens te bewerken</li>
                    <li>Uw gegevens te laten bewerken</li>
                    <li>Doen alsof u nooit op deze website bent geweest</li>
                </ul>
                <p>Wij hebben het recht om u te nergeren</p>
                <span class="title-block-alt">Diensten van derden</span>
                <p>Wij maken mogelijk gebruik van diensten van derden om onze website te beheren.</p>
                <p>Wij hebben hun privacybeleid waarschijnlijk ook niet gelezen.</p>
                <span class="title-block-alt">Changes to our policy</span>
                <p>Wij kunnen dit Privacybeleid op ieder moment aanpassen.</p>
                <p>Bij grote wijzigingen zullen we waarschijnlijk vergeten erover te berichten, of gewoon hopen dat niemand het merkt.</p>
            </div>
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
