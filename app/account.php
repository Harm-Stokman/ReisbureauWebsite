<?php

include_once 'includes/pdo.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw Account</title>
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
        <div class="admin-page">
            <h1>Accountinformatie</h1>
            <div class="user-box">
                <div>
                    <span>Gebruikersnaam:</span>
                    <span>E-Mailadres:</span>
                </div>
            </div>
            <h1>Uw boekingen</h1>
            <div class="admin-field">
                
            </div>
        </div>
    </main>
</body>

</html>