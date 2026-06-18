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
                    <form class="searchbar" method="get" name="filterbar" action="reizen.php">
                        <select class="dropdown-selection" name="typevacation">
                            <option value="">Type vakantie</option>
                            <option value="Strand_en_zon">Strand en zon</option>
                            <option value="Natuur">Natuur</option>
                            <option value="Cultuur">Cultuur</option>
                            <option value="Stedentrip">Stedentrip</option>
                            <option value="Wintersport">Wintersport</option>
                        </select>
                        <select class="dropdown-selection" name="continent">
                            <option value="">Continent</option>
                            <option value="Azië">Azië</option>
                            <option value="Europa">Europa</option>
                            <option value="Afrika">Afrika</option>
                            <option value="Noord-Amerika">Noord-Amerika</option>
                            <option value="Zuid-Amerika">Zuid-Amerika</option>
                            <option value="Oceanie">Oceanië</option>
                        </select>
                        <div class="searchbar">
                            <input class="search-button" type="submit" name="filterbutton">
                        </div>
                    </form>
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

                        // Filterbar
                        if (isset($_GET['filterbutton'])) {

                            $typevacation = $_GET['typevacation'];
                            $continent = $_GET['continent'];
                            $test = "Cultuur";

                            $sql = 'SELECT * FROM Reizen WHERE Continent = :continent AND ' . $typevacation . ' = 1' ;
                            $statement = $pdo->prepare($sql);
                            $statement->bindParam(":continent", $continent);
                            $statement->execute();

                        } else if (isset($_GET['searchbutton'])) {
                            $zoekopdracht = $_GET['search'] ?? '';

                            $sql = 'SELECT * FROM Reizen WHERE Bestemming LIKE ?  OR Land LIKE ? OR Continent LIKE ?';
                            $statement = $pdo->prepare($sql);
                            $statement->execute([
                                '%' . $zoekopdracht . '%',
                                '%' . $zoekopdracht . '%',
                                '%' . $zoekopdracht . '%'
                            ]);
                        } else if (isset($_GET['typevacation']) == '' && isset($_GET['continent']) == '') {
                            //  Show alles van burgers tenzij hij leeg is.
                            //  Define SQL statement
                            $sql = "SELECT * FROM Reizen";

                            //  Prepare SQL statement
                            $statement = $pdo->prepare($sql);

                            //  Exacute SQL statement
                            $statement->execute();
                        } else {
                            //  Show alles van burgers tenzij hij leeg is.
                            //  Define SQL statement
                            $sql = "SELECT * FROM Reizen";

                            //  Prepare SQL statement
                            $statement = $pdo->prepare($sql);

                            //  Exacute SQL statement
                            $statement->execute();    
                        }
                        

                        $reizen = $statement->fetchAll();

                        foreach ($reizen as $reis) {

                    ?>
                        <div class="one-destination">
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
                                <?php echo "<img src='img/" . $reis['kaart_afbeelding'] . "' alt='Bestemming image'>" ?>
                            </div>
                            <div class="info-bestemming">
                                <div class="text-info-bestemming">
                                    <div class="titel-bestemming"><?php echo $reis['Bestemming'] ?>,
                                        <?php echo $reis['Land'] ?></div>
                                    <p> <?php echo $reis['korte_beschrijving'] ?> </p>
                                </div>
                                <div class="vlag-prijs">
                                    <img src="img/<?php echo $reis['Vlag'] ?>" alt="vlag image">
                                    <a href="reisinfo.php? id=<?php echo $reis['Reis_id'] ?>">Nu vanaf €<?php echo $reis['Prijs'] ?>,- pp</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="vragen-reizen">
                <span class="title-block-alt">Vragen?</span>
                <a href="contact.php">
                    <button class="action-button">Neem contact op</button>
                </a>
            </div>
        </div>
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
