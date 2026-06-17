<?php
include_once 'includes/pdo.php';


if (isset($_POST['reset'])) {

    $password = $_POST['password'];
    $passwordcheck = $_POST['passwordcheck'];
    $resetmail = $_POST['usermail'];

    if ($passwordcheck == $password) {
        $sqlpasswordreset = "UPDATE Gebruikers 
                SET Wachtwoord = ?
                 WHERE Emailadres = ?";
        $passwordreset = $pdo->prepare($sqlpasswordreset);
        $passwordreset->bindParam(1, $password);
        $passwordreset->bindParam(2, $resetmail);
        $passwordreset->execute();

        // echo "Wachtwoord gereset";
        header('Location: inlog.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord herstellen</title>
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
    <div class="user-actions">
        <span class="title-block">Wachtwoord herstellen</span>
        <?php

        if (isset($_POST['submit'])) { ?>
            <form class="userform" method="post">
                <?php

                // eerst checken of er een gebruiker is met het ingevulde E-mailadres
            
                $mail = $_POST['email'];

                $recoverysql = "SELECT * FROM Gebruikers 
                WHERE Emailadres = ?";

                $recovery = $pdo->prepare($recoverysql);
                $recovery->bindParam(1, $mail);
                $recovery->execute();

                $recovereduser = $recovery->fetch();


                if ($recovery->rowCount() > 0) {

                    $getcode = "SELECT UID, expiration FROM Wachtwoord_vergeten
                    WHERE Emailadres= ?";
                    $getcodestatement = $pdo->prepare($getcode);
                    $getcodestatement->bindParam(1, $mail);
                    $getcodestatement->execute();
                    $getcoderesult = $getcodestatement->fetch();
                    echo "Uw code: ";

                    // voor als er een nieuwe code aangemaakt moet worden
                    $email = $recovereduser['Emailadres'];
                    $date = date("Y-m-d", strtotime('tomorrow'));
                    $key = $_POST['key'];

                    $sqlkey = "INSERT INTO Wachtwoord_vergeten (`UID`, `expiration`, `Emailadres`) VALUES (?, ?, ?)";

                    $keystatement = $pdo->prepare($sqlkey);
                    $keystatement->bindParam(1, $key);
                    $keystatement->bindParam(2, $date);
                    $keystatement->bindParam(3, $email);


                    if ($getcodestatement->rowCount() == 0) {
                        $keystatement->execute();
                        echo $key;
                    } else if ($getcoderesult['expiration'] > date("Y-m-d")) {
                        $sqldeletereset = "DELETE FROM Wachtwoord_vergeten
                        WHERE Emailadres = ?";
                        $deletestatement = $pdo->prepare($sqldeletereset);
                        $deletestatement->bindParam(1, $email);
                        $deletestatement->execute();
                        $keystatement->execute();
                        echo $key;
                    }
                }
                ?>
                <div>
                    <input type="hidden" name="codefromdata" value="<?php echo $getcoderesult['UID'] ?>">
                    <input type="hidden" name="usermail" value="<?php echo $mail; ?>">
                    <input type="text" name="codekey" placeholder="Vul de code in" required>
                </div>
                <input class="action-button" type="submit" name="code" value="Code invoeren">
            </form>

        <?php } else if (isset($_POST['code']) && $_POST['codekey'] == $_POST['codefromdata']) { ?>
                <form class="userform" method="post">
                    <div>
                        <input type="hidden" name="usermail" value="<?php echo $_POST['usermail'] ?>">
                        <input type="password" name="password" placeholder="Uw nieuwe wachtwoord" required>
                        <input type="password" name="passwordcheck" placeholder="Wachtwoord herhalen" required>
                    </div>
                    <input class="action-button" type="submit" name="reset">
                </form>
        <?php } else { ?>
                <form class="userform" method="post">
                    <div>
                        <input type="hidden" name="key" value="<?php echo uniqid() ?>">
                        <input type="email" name="email" placeholder="Uw E-mailadres" required>
                    </div>
                    <input class="action-button" type="submit" name="submit" value="Code versturen">
                </form>
        <?php } ?>
    </div>
</body>

</html>