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
            <div class="one-destination">
                <!-- Image en label -->
                <div>
                    <div class="index-label"></div>
                    <img src="" alt="">
                </div>
                <!-- Title betemming en korte info -->
                <div>
                    <div>
                        <div></div>
                        <p></p>
                    </div>
                    <!-- Vlag en prijs button -->
                    <div>
                        <img src="" alt="">
                        <a href=""></a>
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
