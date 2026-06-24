<?php
session_start();

include_once 'includes/pdo.php';


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    if ($_SESSION['username'] === "Admin") {

    } else {
        header('Location: index.php');
    }
} else {
    header('Location: inlog.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Reizen
    WHERE `Reis_id` = ?";

    $delete = $pdo->prepare($sql);
    $delete->bindParam(1, $id);
    $delete->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
        <div class="admin-page">
            <div class="admin-section">
                <span class="title-block">
                    Bestaande reizen
                </span>
                <div class="admin-field">
                    <?php

                    $sql = "SELECT * FROM Reizen";
                    $searchStatement = $pdo->prepare($sql);
                    $searchStatement->execute();

                    $reizen = $searchStatement->fetchAll();

                    foreach ($reizen as $reis) { ?>
                        <div class="admin-block">
                            <div class="travel-info">
                                <img src="img/<?php echo $reis['Vlag'] ?>" alt="Afbeelding van vlag">
                            </div>
                            <div class="travel-names">
                                <?php echo $reis['Bestemming'] . ",";
                                echo "<br>";
                                echo $reis['Land'];
                                ?>
                            </div>
                            <div class="admin-actions">
                                <a href="edit.php? id=<?php echo $reis['Reis_id'] ?>"> <button
                                        class="button-top">Edit</button> </a>
                                <a href="admin.php?  id=<?php echo $reis['Reis_id'] ?>"> <button
                                        class="button-bottom">Delete</button> </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a href="add.php"><button class="action-button">Bestemming toevoegen</button></a>
            </div>
            <div class="admin-section">
                <span class="title-block">
                    Boekingen
                </span>
                <div class="admin-field">
                    <?php
                    $sqlboekingen = "SELECT Gebruikers.Gebruikersnaam, Reizen.Bestemming, Boekingen.Aantal_personen, Boekingen.Startdatum, Boekingen.Einddatum FROM Boekingen JOIN Gebruikers ON Boekingen.`User_id` = Gebruikers.`User_id` JOIN Reizen ON Boekingen.`Reis_id` = Reizen.`Reis_id`";
                    $bookingstatement = $pdo->prepare($sqlboekingen);
                    $bookingstatement->execute();
                    $boekingen = $bookingstatement->fetchAll();
                    if ($bookingstatement->rowCount() > 0) {
                        foreach ($boekingen as $boeking) { ?>
                            <div class="admin-booking-block">
                                <div class="booking-info">
                                    <span>Locatie: <?php echo $boeking['Bestemming'] ?></span>
                                    <span>Op naam van: <?php echo $boeking['Gebruikersnaam'] ?></span>
                                    <span>Aantal personen: <?php echo $boeking['Aantal_personen'] ?> </span>
                                    <span>Duur: <?php echo $boeking['Startdatum'] ?> tot
                                        <?php echo $boeking['Einddatum'] ?></span>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo "Geen boekingen gevonden..";
                    } ?>
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
