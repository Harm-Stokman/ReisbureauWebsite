<?php

session_start();
include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken</title>
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
        <form>
            <div class="boeken-header">
                <span class="title-block">Boek nu uw reis naar <?php echo $reis['Bestemming'] ?></span>
                <div class="boeken-vacations">
                    <span class="title-block-alt">Boek info</span>
                    <select class="dropdown-selection">
                        <option value="">Aantal personen</option>
                        <option value="1-persoon">1 persoon</option>
                        <option value="2-personen">2 personen</option>
                        <option value="3-personen">3 personen</option>
                        <option value="4-personen">4 personen</option>
                        <option value="5-personen">5 personen</option>
                        <option value="6-personen">6 personen</option>
                    </select>
                    <input class="dropdown-selection" type="date" name="datum">
                    <select class="dropdown-selection">
                        <option value="">Duur</option>
                        <option value="3-dagen">3 dagen</option>
                        <option value="5-dagen">5 dagen</option>
                        <option value="1-week">1 week</option>
                        <option value="2-weken">2 weken</option>
                        <option value="3-weken">3 weken</option>
                        <option value="4-weken">4 weken</option>
                    </select>
                </div>
            </div>
            <div class="last-check">
                <span class="title-block">Last check</span>
                <div class="last-info-boeken">
                    <div class="boeken-small-info">
                        <span class="about-us-title">Aantal personen:</span>
                        <p>1 persoon</p>
                    </div>
                    <div class="boeken-small-info">
                        <span class="about-us-title">Datum van vertrek:</span>
                        <p>24-08-2026</p>
                    </div>
                    <div class="boeken-small-info">
                        <span class="about-us-title">Duur van vakantie:</span>
                        <p>3 weken</p>
                    </div>
                </div>
                <div class="prijs-boeken">
                    <span class="title-block-alt">Totale prijs</span>
                    <div class="totaal-prijs">€<?php echo $reis['Prijs'] ?> in total</div>
                    <p>De prijs word berekend door de vlucht prijs + €15 administratie kosten</p>
                </div>
                <input class="action-button" type="submit" name="">
            </div>
        </form>
        <button class="go-to-top-button" id="goBackToTop">↑</button>
    </main>

    <script>
        const goBackToTopButton = document.getElementById("goBackToTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                goBackToTopButton.classList.add("show");
            } else {
                goBackToTopButton.classList.remove("show");
            }
        });

        goBackToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

    <footer>

        <?php
        include_once 'includes/footer.php';
        ?>
    </footer>

</body>

</html>
