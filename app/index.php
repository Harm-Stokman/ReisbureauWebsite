<?php 

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
        <div class="index-header">
            <div>
                <span class="title-block">Vind jou vakantie</span>
                <div class="find-vacations">
                    <select class="dropdown-selection" name="type">
                        <option value="">Type vakantie</option>
                        <option value="Strand-en-zon">Strand en zon</option>
                    </select>
                    <select class="dropdown-selection" name="continent">
                        <option value="">Continent</option>
                        <option value="asia">Azië</option>
                    </select>
                    <div class="search-button">
                        <a href="index.php">Zoeken</a>  <!-- Voor nu -->
                    </div>
                </div>
            </div>
        </div>
        <div class="destinations-index">
            <span class="title-block">Vind uw bestemming</span>
            <div class="destinations-flex">
                <div class="one-destination">
                    <!-- Image en label -->
                    <div class="image-label">
                        <div class="index-label">Strand en zon</div>
                        <img src="img/willemstad-card.png" alt="Bestemming image">
                    </div>
                    <!-- Title betemming en korte info -->
                    <div class="info-bestemming">
                        <div class="text-info-bestemming">
                            <div class="titel-bestemming">Willemstad, Curacao</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non tempore, ex reprehenderit, minima dicta exercitationem minus sunt aperiam reiciendis officiis consequatur deleniti perferendis accusamus architecto quisquam vitae autem velit quae.</p>
                        </div>
                        <!-- Vlag en prijs button -->
                        <div class="vlag-prijs">
                            <img src="img/Curacao.png" alt="vlag image">
                            <a href="">Nu vanaf $3000,- pp</a>
                        </div>
                    </div>
                </div>
                <div class="one-destination">
                    <!-- Image en label -->
                    <div class="image-label">
                        <div class="index-label">Strand en zon</div>
                        <img src="img/willemstad-card.png" alt="Bestemming image">
                    </div>
                    <!-- Title betemming en korte info -->
                    <div class="info-bestemming">
                        <div class="text-info-bestemming">
                            <div class="titel-bestemming">Willemstad, Curacao</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non tempore, ex reprehenderit, minima dicta exercitationem minus sunt aperiam reiciendis officiis consequatur deleniti perferendis accusamus architecto quisquam vitae autem velit quae.</p>
                        </div>
                        <!-- Vlag en prijs button -->
                        <div class="vlag-prijs">
                            <img src="img/Curacao.png" alt="vlag image">
                            <a href="">Nu vanaf $3000,- pp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reviews-index">
            <span class="title-block">Reviews</span>
            <div class="one-review">
                <div class="review-header">
                    <div class="review-info">
                        <span>Erik Bakker</span>
                        <span>Review over Tokyo, Japan</span>
                    </div>
                    <span>5/5</span>
                </div>
                <p>Ik ging naar Japan met Vaygo. Wat een tyfus. Ik ga morgen weer.</p>
            </div>
            <div class="one-review">
                <div class="review-header">
                    <div class="review-info">
                        <span>Harm</span>
                        <span>Review over Lissabon, Portugal</span>
                    </div>
                    <span>1/5</span>
                </div>
                <p>kanker</p>
            </div>
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
