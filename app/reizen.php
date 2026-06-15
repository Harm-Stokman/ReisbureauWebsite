<?php 

session_start();
include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle reizen</title>
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
        <div class="main-reizen">
            <div class="reizen-header">
                <div>
                    <span class="title-block">Zoek jou vakantie</span>
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
                        <select class="dropdown-selection" name="continent">
                            <option value="">Prijs</option>
                            <option value="prijs-500">€200-500</option>
                            <option value="prijs-800">€500-800</option>
                            <option value="prijs-1000">€800-1000</option>
                            <option value="prijs-1500">€1000-1500</option>
                            <option value="prijs-2000">€1500-2000</option>
                            <option value="prijs-2000+">€2000 of hoger</option>
                        </select>
                        <div class="search-button">
                            <a href="index.php">Zoeken</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="specific-search">
                <span class="title-block-alt">Zoek iets specifieks</span>
                <div class="searchbar">
                    <form method="get" name="searchbar" action="reizen.php">
                        <input class="input-bar" type="text" name="search" placeholder="Zoek reis...">
                        <input class="search-button" type="submit" name="searchbutton">
                    </form>
                </div>
            </div>
            <div class="destinations-index">
                <span class="title-block">Vind uw bestemming</span>
                <div class="destinations-flex">
                <?php

                    if (!isset($_GET['searchbutton']) || $_GET['search'] == "") {
                        //  Show alles van burgers tenzij hij leeg is.
                        //  Define SQL statement
                        $sql = "SELECT * FROM Reizen";

                        //  Prepare SQL statement
                        $statement = $pdo->prepare($sql);

                        //  Exacute SQL statement
                        $statement->execute();
                    } else {
                        $zoekopdracht = $_GET['search'] ?? '';

                        $sql = 'SELECT * FROM Reizen WHERE Bestemming LIKE ?  OR Land LIKE ? OR Continent LIKE ?';
                        $statement = $pdo->prepare($sql);
                        $statement->execute([
                            '%' . $zoekopdracht . '%',
                            '%' . $zoekopdracht . '%',
                            '%' . $zoekopdracht . '%'
                        ]);
                    } 

                    $reizen = $statement->fetchAll();

                    foreach($reizen as $reis) {
                            
                ?>     
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
                            <a href="reisinfo.php? id=<?php echo $reis['Reis_id'] ?>">Nu vanaf €<?php echo $reis['Prijs'] ?>,- pp</a>
                        </div>
                    </div>
                </div>
                <?php } // einde foreach ?>
                </div>
            </div>
            <div class="vragen-reizen">
                <span class="title-block-alt">Vragen?</span>
                <a href="contact.php">
                    <button class="action-button">Neem contact op</button>
                </a>
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
