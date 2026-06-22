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

if (isset($_POST['submit'])) {


$id = $_POST['id'];

    header('Location: admin.php');

    if ($_POST['strandzon'] == null) {
        $_POST['strandzon'] = 0;
    }

    if ($_POST['stedentrip'] == null) {
        $_POST['stedentrip'] = 0;
    }

    if ($_POST['wintersport'] == null) {
        $_POST['wintersport'] = 0;
    }

    if ($_POST['natuur'] == null) {
        $_POST['natuur'] = 0;
    }

    if ($_POST['cultuur'] == null) {
        $_POST['cultuur'] = 0;
    }

    $sqlupdate = " UPDATE Reizen SET Bestemming = ?, Land = ?, korte_beschrijving = ?, Prijs = ?, Vlag = ?, Continent = ?, Strand_en_zon = ?, Stedentrip = ?, Wintersport = ?, Natuur = ?, Cultuur = ?, Welkom_bericht = ?, Historie = ?, Wat_te_doen = ?, kaart_afbeelding = ? WHERE Reis_id = $id";

    $updatestatement = $pdo->prepare($sqlupdate);
    $updatestatement->bindParam(1, $_POST['bestemming']);
    $updatestatement->bindParam(2, $_POST['land']);
    $updatestatement->bindParam(3, $_POST['beschrijving']);
    $updatestatement->bindParam(4, $_POST['prijs']);
    $updatestatement->bindParam(5, $_POST['vlag']);
    $updatestatement->bindParam(6, $_POST['continent']);
    $updatestatement->bindParam(7, $_POST['strandzon']);
    $updatestatement->bindParam(8, $_POST['stedentrip']);
    $updatestatement->bindParam(9, $_POST['wintersport']);
    $updatestatement->bindParam(10, $_POST['natuur']);
    $updatestatement->bindParam(11, $_POST['cultuur']);
    $updatestatement->bindParam(12, $_POST['welkomstbericht']);
    $updatestatement->bindParam(13, $_POST['historie']);
    $updatestatement->bindParam(14, $_POST['wattedoen']);
    $updatestatement->bindParam(15, $_POST['kaartafbeelding']);

    $updatestatement->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis bewerken</title>
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
        <div class="user-actions">
            <span class="title-block">
                Reis Bewerken
            </span>
             <a href="admin.php"><button class="action-button">Terug</button></a>
            <?php

            if (isset($_GET['id'])) {
                $reisstatement = $pdo->prepare("SELECT * FROM Reizen
            WHERE `Reis_id` = ?");
                $reisstatement->bindParam(1, $_GET['id']);
                $reisstatement->execute();
            } else {
                $reisstatement = $pdo->prepare("SELECT * FROM Reizen
            WHERE `Reis_id` = ?");
                $reisstatement->bindParam(1, $_POST['id']);
                $reisstatement->execute();
            }
            $reis = $reisstatement->fetch();


            ?>


            <form class="userform" method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $reis['Reis_id'] ?>">
                    <input type="text" name="bestemming" placeholder="Bestemming"
                        value="<?php echo $reis['Bestemming'] ?>">
                    <input type="text" name="land" placeholder="Land" value="<?php echo $reis['Land'] ?>">
                    <textarea rows="1" name="beschrijving"
                        placeholder="Korte beschrijving"><?php echo $reis['korte_beschrijving'] ?></textarea>
                    <input type="text" name="prijs" placeholder="Prijs" value="<?php echo $reis['Prijs'] ?>">
                    <select type="text" name="continent">
                        <option value="Continent">Continent...</option>
                        <option value="Noord-Amerika"
                        
                         <?php 
                        
                        if ($reis['Continent'] == "Noord-Amerika") {
                            echo "selected";
                        }

                        ?>
    
                        >Noord-Amerika</option>
                        <option value="Zuid-Amerika"
                        
                        <?php 
                        
                        if ($reis['Continent'] == "Zuid-Amerika") {
                            echo "selected";
                        }

                        ?>
                        
                        >Zuid-Amerika</option>
                        <option value="Europa" 
                        
                        <?php 
                        
                        if ($reis['Continent'] == "Europa") {
                            echo "selected";
                        }

                        ?>
                        
                        >Europa</option>
                        <option value="Azië"
                        
                        <?php 
                        
                        if ($reis['Continent'] == "Azië") {
                            echo "selected";
                        }

                        ?>
                        
                        >Azië</option>
                        <option value="Afrika" 
                        
                        <?php 
                        
                        if ($reis['Continent'] == "Afrika") {
                            echo "selected";
                        }

                        ?>

                        >Afrika</option>
                        <option value="Oceanië"
                        
                        <?php 
                        
                        if ($reis['Continent'] == "Oceanië") {
                            echo "selected";
                        }

                        ?>
                        
                        >Oceanië</option>
                    </select>
                    <label>Strand en zon</label>
                    <input type="checkbox" name="strandzon" value="1" <?php
                    if ($reis['Strand_en_zon'] == 1) {
                        echo "checked";
                    }
                    ?>>
                    <label>Stedentrip</label>
                    <input type="checkbox" name="stedentrip" placeholder="Stedentrip" value="1" <?php
                    if ($reis['Stedentrip'] == 1) {
                        echo "checked";
                    }
                    ?>>
                    <label>Wintersport</label>
                    <input type="checkbox" name="wintersport" placeholder="Wintersport" value="1" <?php
                    if ($reis['Wintersport'] == 1) {
                        echo "checked";
                    }
                    ?>>
                    <label>Natuur</label>
                    <input type="checkbox" name="natuur" placeholder="Natuur" value="1" <?php
                    if ($reis['Natuur'] == 1) {
                        echo "checked";
                    }
                    ?>>
                    <label>Cultuur</label>
                    <input type="checkbox" name="cultuur" placeholder="Cultuur" value="1" <?php
                    if ($reis['Cultuur'] == 1) {
                        echo "checked";
                    }
                    ?>>
                    <textarea rows="1" name="welkomstbericht" placeholder="Welkomstbericht"><?php echo $reis['Welkom_bericht'] ?></textarea>
                    <textarea rows="1" name="historie" placeholder="Historie"><?php echo $reis['Historie'] ?></textarea>
                    <textarea rows="1" name="wattedoen" placeholder="Wat te doen"><?php echo $reis['Wat_te_doen'] ?></textarea>
                    <input type="text" name="vlag" placeholder="Vlag" value="<?php echo $reis['Vlag'] ?>">
                    <input type="text" name="kaartafbeelding" placeholder="Kaart-afbeelding" value="<?php echo $reis['kaart_afbeelding'] ?>">
                </div>
                <input class="action-button" type="submit" name="submit" value="Bewerken">
            </form>
        </div>
    </main>
</body>

</html>
