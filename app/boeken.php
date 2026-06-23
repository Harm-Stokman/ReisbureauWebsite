<?php

session_start();
include_once 'includes/pdo.php';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true) {

} else {
    header('Location: inlog.php');
}

if (isset($_POST['boeken'])) {

    header('Location: account.php');
    $reisid = $_POST['reis'];
    $bookeduser = $_SESSION['user_id'];
    $aantalpersonen = $_POST['aantal_personen'];
    $startdatum = $_POST['datum'];
    $duur = $_POST['duur'];

    if ($duur == "3 dagen") {
        $duur = 3;
    }

     if ($duur == "5 dagen") {
        $duur = 5;
    }

    if ($duur == "1 week") {
        $duur = 7;
    }

    if ($duur == "2 weken") {
        $duur = 14;
    }

    if ($duur == "3 weken") {
        $duur = 21;
    }

    if ($duur == "4 weken") {
        $duur = 28;
    }
    
    $einddatum = date('Y-m-d', strtotime($startdatum . ' + ' . $duur . ' days'));

    $bookingsql = "INSERT INTO Boekingen
    (Reis_id, User_id, Aantal_personen, Startdatum, Einddatum)
    VALUES (?, ?, ?, ?, ?)";

    $bookingadd = $pdo->prepare($bookingsql);
    $bookingadd->bindParam(1, $reisid);
    $bookingadd->bindParam(2, $bookeduser);
    $bookingadd->bindParam(3, $aantalpersonen);
    $bookingadd->bindParam(4, $startdatum);
    $bookingadd->bindParam(5, $einddatum);
    $bookingadd->execute();
}


$sqlreis = "SELECT Bestemming, Reis_id, Prijs FROM Reizen WHERE Reis_id = ?";
$reisstatement = $pdo->prepare($sqlreis);   // Maak verbinding met de database en bereid de SQL statement voor
$reisstatement->bindParam(1, $_GET['id']);  // Krijg ID van de link waar je op hebt geklikt (bindParam als placeholder)
$reisstatement->execute();                  // Voer de SQL statement uit
$reis = $reisstatement->fetch();

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
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&display=swap"
        rel="stylesheet">
    <script src="scripts/script.js"></script>
</head>

<body>

    <header>
        <img src="img/logo-vaygo.png" alt="logo Vaygo">

        <?php
        include_once 'includes/header.php';
        ?>

    </header>

    <main>
        <form method="post">
            <div class="boeken-header">
                <span class="title-block">Boek nu uw reis naar <?php echo $reis['Bestemming'] ?></span>
                <div class="boeken-vacations">
                    <span class="title-block-alt">Boek info</span>
                    <input type="hidden" name="reis" value="<?php echo $reis['Reis_id'] ?>">
                    <input type="hidden" id="standaard_prijs" value="<?php echo $reis['Prijs'] ?>">
                    <select name="aantal_personen" id="aantal_personen"
                        onchange="displayPeople(this.id), calculatePrice(this.id)" class="dropdown-selection">
                        <option value="1">1 persoon</option>
                        <option value="2">2 personen</option>
                        <option value="3">3 personen</option>
                        <option value="4">4 personen</option>
                        <option value="5">5 personen</option>
                        <option value="6">6 personen</option>
                    </select>
                    <input class="dropdown-selection" id="datum" onchange="displayDate(this.id)" type="date"
                        name="datum">
                    <select name="duur" id="duur" onchange="displayDuration(this.id)" class="dropdown-selection">
                        <option value="---">Duur</option>
                        <option value="3 dagen">3 dagen</option>
                        <option value="5 dagen">5 dagen</option>
                        <option value="1 week">1 week</option>
                        <option value="2 weken">2 weken</option>
                        <option value="3 weken">3 weken</option>
                        <option value="4 weken">4 weken</option>
                    </select>
                </div>
            </div>
            <div class="last-check">
                <span class="title-block">Last check</span>
                <div class="last-info-boeken">
                    <div class="boeken-small-info">
                        <span class="about-us-title">Aantal personen:</span>
                        <span id="aantal_result">---</span>
                    </div>
                    <div class="boeken-small-info">
                        <span class="about-us-title">Datum van vertrek:</span>
                        <span id="datum_result">---</span>
                    </div>
                    <div class="boeken-small-info">
                        <span class="about-us-title">Duur van vakantie:</span>
                        <span id="duur_result">---</span>
                    </div>
                </div>
                <div class="prijs-boeken">
                    <span class="title-block-alt">Totale prijs</span>
                    <div class="totaal-prijs" id="prijs"></div>
                    <p>De prijs word berekend door de vlucht prijs + €15 administratie kosten</p>
                </div>
                <input class="action-button" type="submit" name="boeken" value="Toevoegen aan bestelling">
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