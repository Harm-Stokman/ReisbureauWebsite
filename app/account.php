<?php
session_start();
include_once 'includes/pdo.php';

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] = true) {

} else {
    header('Location: inlog.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw Account</title>
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

        $usersql = "SELECT * FROM Gebruikers 
        WHERE User_id = ?";

        $userstatement = $pdo->prepare($usersql);
        $userstatement->bindParam(1, $_SESSION['user-id']);
        $userstatement->execute();
        $user = $userstatement->fetch();

        $id = $user['User_id'];

        ?>


    </header>
    <main>
        <div class="admin-page">
            <h1>Accountinformatie</h1>
            <div class="user-box">
                <div>
                    <span>Gebruikersnaam: <?php echo $user['Gebruikersnaam'] ?></span>
                    <span>E-Mailadres: <?php echo $user['Emailadres'] ?> </span>
                </div>
            </div>
            <h1>Uw boekingen</h1>
            <div class="admin-field">
                <?php
                $sqlboekingen = "SELECT Gebruikers.Gebruikersnaam, Reizen.Bestemming, Boekingen.Aantal_personen, Boekingen.Startdatum, Boekingen.Einddatum
            FROM Boekingen 
            JOIN Gebruikers ON Boekingen.`User_id` = Gebruikers.`User_id` AND Gebruikers.`User_id` = ?
            JOIN Reizen ON Boekingen.`Reis_id` = Reizen.`Reis_id`";
                $bookingstatement = $pdo->prepare($sqlboekingen);
                $bookingstatement->bindParam(1, $id);
                $bookingstatement->execute();
                $boekingen = $bookingstatement->fetchAll();

                if ($bookingstatement->rowCount() > 0) {



                    foreach ($boekingen as $boeking) { ?>
                        <div class="admin-booking-block">
                            <div class="booking-info">
                                <span>Locatie: <?php echo $boeking['Bestemming'] ?></span>
                                <span>Op naam van: <?php echo $boeking['Gebruikersnaam'] ?></span>
                                <span>Aantal personen: <?php echo $boeking['Aantal_personen'] ?> </span>
                                <span>Duur: <?php echo $boeking['Startdatum'] ?> tot <?php echo $boeking['Einddatum'] ?></span>
                            </div>
                            <a href="account.php"><button class="delete-button">X</button></a>
                        </div>
                    <?php }
                } else {
                    echo "Geen boekingen gevonden..";
                } ?>
            </div>
        </div>
    </main>
</body>

</html>