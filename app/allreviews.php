<?php 
session_start();
include_once 'includes/pdo.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle reviews</title>
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
        
 <div class="reviews-index">
            <span class="title-block">Alle reviews</span>
            <a href="review.php"><button class="action-button">Review schrijven?</button></a>
            <?php 
            $sqlrecensie = "SELECT Gebruikers.Gebruikersnaam, Reizen.Bestemming, recensies.Bericht, recensies.Beoordeling
            FROM recensies 
            JOIN Gebruikers ON recensies.`User_id` = Gebruikers.`User_id`
            JOIN Reizen ON recensies.`Reis_id` = Reizen.`Reis_id`";
            $reviewstatement = $pdo->prepare($sqlrecensie);
            $reviewstatement->execute();
            $reviews = $reviewstatement->fetchAll();

            foreach ($reviews as $review) { ?>
                <div class="one-review">
                <div class="review-header">
                    <div class="review-info">
                        <span><?php echo  $review['Gebruikersnaam'] ?> </span>
                        <span>Review over de reis naar <?php echo $review['Bestemming'];?></span>
                    </div>
                    <span><?php echo $review['Beoordeling'] ?> / 5</span>
                </div>
                <p><?php echo $review['Bericht'] ?></p>
            </div>
           <?php } ?>
        </div>
    </main>
</body>
</html>