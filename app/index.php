<?php 
session_start();
include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaygo</title>
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
        <div class="index-header" >
            <div>
                <span class="title-block">Vind jou vakantie</span>
                <div class="find-vacations">
                    <select class="dropdown-selection" name="type">
                        <option value="">Type vakantie</option>
                        <option value="Strand-en-zon">Strand en zon</option>
                        <option value="Strand-en-zon">Natuur</option>
                        <option value="Strand-en-zon">Cultuur</option>
                        <option value="Strand-en-zon">Stedentrip</option>
                        <option value="Strand-en-zon">Wintersport</option>
                    </select>
                    <select class="dropdown-selection" name="continent">
                        <option value="">Continent</option>
                        <option value="azie">Azië</option>
                        <option value="europa">Europa</option>
                        <option value="afrika">Afrika</option>
                        <option value="noord-amerika">Noord-Amerika</option>
                        <option value="zuid-amerika">Zuid-Amerika</option>
                        <option value="oceanie">Oceanië</option>
                    </select>
                    <div class="search-button">
                        <a href="index.php">Zoeken</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="destinations-index">
            <span class="title-block">Vind uw bestemming</span>
            <div class="destinations-flex">

                

                <?php

                    //  Show alles van burgers tenzij hij leeg is.
                    //  Define SQL statement
                    $sql = "SELECT * FROM Reizen LIMIT 4";

                    //  Prepare SQL statement
                    $statement = $pdo->prepare($sql);

                    //  Exacute SQL statement
                    $statement->execute();

                    $reizen = $statement->fetchAll();

                    foreach($reizen as $reis) { ?>
                    
                    <div class="one-destination">
                        <!-- Image en label -->
                        <div class="image-label">
                            <div class="label-box">
                                <?php
                                    if ($reis['Strand_en_zon'] == 1) {
                                        echo "<div class='index-label'>Strand en zon</div>";
                                    }
                                    if ($reis['Stedentrip'] == 1) {
                                        echo "<div class='index-label'>Stedentrip</div>";
                                    }
                                    if ($reis['Wintersport'] == 1) {
                                        echo "<div class='index-label'>Wintersport</div>";
                                    }
                                    if ($reis['Natuur'] == 1) {
                                        echo "<div class='index-label'>Natuur</div>";
                                    }
                                    if ($reis['Cultuur'] == 1) {
                                        echo "<div class='index-label'>Cultuur</div>";
                                    }
                                ?>
                            </div>
                            <?php echo "<img src='img/" . $reis['kaart_afbeelding'] . "' alt='Bestemming image'>"?>
                        </div>
                        <!-- Title betemming en korte info -->
                        <div class="info-bestemming">
                            <div class="text-info-bestemming">
                                <div class="titel-bestemming"><?php echo $reis['Bestemming'] ?>, <?php echo $reis['Land'] ?></div>
                                <p> <?php echo $reis['korte_beschrijving'] ?> </p>
                            </div>
                            <!-- Vlag en prijs button -->
                            <div class="vlag-prijs">
                                <img src="img/<?php echo $reis['Vlag'] ?>" alt="vlag image">
                                <a href="reisinfo.php" id="<?php $reis['Reis_id'] ?>">Nu vanaf €<?php echo $reis['Prijs'] ?>,- pp</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

        </div>
        </div>

        <div class="reviews-index">
            <span class="title-block">Reviews</span>

            <?php 
            
            $sqlrecensie = "SELECT Gebruikers.Gebruikersnaam, Reizen.Bestemming, recensies.Bericht, recensies.Beoordeling
            FROM recensies 
            JOIN Gebruikers ON recensies.`User_id` = Gebruikers.`User_id`
            JOIN Reizen ON recensies.`Reis_id` = Reizen.`Reis_id`
            LIMIT 3";
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
            <a href="allreviews.php"><button class="action-button">Zie alle reviews</button></a>
        </div>
    </main>



    <footer>
        
    <?php
    include_once 'includes/footer.php';
    ?>
    </footer>

</body>

</html>
