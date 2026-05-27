<?php

include_once 'includes/pdo.php';

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
                                <a> <button class="button-top">Edit</button> </a>
                                <a> <button class="button-bottom">Delete</button> </a>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
                <a><button class="action-button">Bestemming toevoegen</button></a>
            </div>
            <div class="admin-section">
                <span class="title-block">
                    Boekingen
                </span>
                <div class="admin-field">
                    <?php
                     $sql = "SELECT * FROM Boekingen";
                    $searchStatement = $pdo->prepare($sql);
                    $searchStatement->execute();

                    $boekingen = $searchStatement->fetchAll();

                    ?>

                    <div class="admin-booking-block">
                        <div class="booking-info">
                            <span>Locatie:</span>
                            <span>Op naam van:</span>
                            <span>Aantal personen:</span>
                            <span>Duur: ... tot ...</span>
                        </div>
                    </div>
                    
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