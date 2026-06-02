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
            
            $sqlreview = "SELECT * FROM recensies";
            $reviewstatement = $pdo->prepare($sqlreview);
            $reviewstatement->execute();
            $reviews = $reviewstatement->fetchAll();

            
            

            foreach ($reviews as $review) { ?>
            <?php 

            $sqluserreview = "SELECT * FROM Gebruikers WHERE `User-id` = ?";
            $userreview = $pdo->prepare($sqluserreview);
            $userreview->bindParam(1, $review['User-id']);
            $userreview->execute();
            $userreviewer = $userreview->fetch();

            $sqlreisreview = "SELECT * FROM Reizen WHERE `Reis-id` = ?";
            $reisreview = $pdo->prepare($sqlreisreview);
            $reisreview->bindParam(1, $review['Reis-id']);
            $reisreview->execute();
            $reisreviewer = $reisreview->fetch();


            ?>
                <div class="one-review">
                <div class="review-header">
                    <div class="review-info">
                        <span><?php echo  $userreviewer['Gebruikersnaam'] ?> </span>
                        <span>Review over de reis naar <?php echo $reisreviewer['Bestemming'];?></span>
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