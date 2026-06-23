<?php                        
    // Filterbar
    if (isset($_GET['filterbutton'])) {
        $typevacation = $_GET['typevacation'];
        $continent = $_GET['continent'];

        if ($typevacation == '' || $continent == '') {
            //  Show alles van burgers tenzij hij leeg is.
            //  Define SQL statement
            $sql = "SELECT * FROM Reizen";

            //  Prepare SQL statement
            $statement = $pdo->prepare($sql);

            //  Exacute SQL statement
            $statement->execute();   
        } else {
            $sql = 'SELECT * FROM Reizen WHERE Continent = :continent AND '. $typevacation .' = 1';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":continent", $continent);
            $statement->execute();
        }

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
            <div class="titel-bestemming"><?php echo $reis['Bestemming'] ?>, <?php echo $reis['Land'] ?></div>
            <p> <?php echo $reis['korte_beschrijving'] ?> </p>
        </div>
        <div class="vlag-prijs">
            <img src="img/<?php echo $reis['Vlag'] ?>" alt="vlag image">
            <a href="reisinfo.php? id=<?php echo $reis['Reis_id'] ?>">Nu vanaf €<?php echo $reis['Prijs'] ?>,- pp</a>
        </div>
    </div>
</div>
<?php } ?>
