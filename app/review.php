<?php
session_start();
include_once 'includes/pdo.php';

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true) {
    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO recensies (`User-id`, `Reis-id`, `Bericht`, `Beoordeling`) VALUES (?, ?, ?, ?)";

        $reviewstatement = $pdo->prepare($sql);

        $reviewstatement->bindParam(1, $_POST["user"]);
        $reviewstatement->bindParam(2, $_POST["reis"]);
        $reviewstatement->bindParam(3, $_POST["bericht"]);
        $reviewstatement->bindParam(4, $_POST["beoordeling"]);
        $reviewstatement->execute();
        header('Location: allreviews.php');
    }
} else {
    header('Location: inlog.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schrijf een review!</title>
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
        <div class="user-actions">
            <span class="title-block">
                Schrijf een review!
            </span>
            <form class="userform" method="post">
                <select type="text" name="reis">
                    <?php

                    $sql = "SELECT * FROM Reizen";

                    $statementOverzicht = $pdo->prepare($sql);

                    $statementOverzicht->execute();

                    $reizen = $statementOverzicht->fetchAll();

                    foreach ($reizen as $reis) { ?>
                        <option name="bestemming" value="<?php echo $reis['Reis_id'] ?>"> <?php echo $reis['Bestemming'] ?>
                        </option>
                    <?php } ?>
                </select>
                 <input type="hidden" name="user" value="<?php echo $_SESSION['user_id'];?>">
                <input type="number" name="beoordeling" max="5" min="1">
                <div>
                    <textarea rows="1" name="bericht" placeholder="Uw review"></textarea>
                </div>
                <input class="action-button" type="submit" name="submit" value="Verzenden">
            </form>
        </div>
    </main>
</body>

</html>