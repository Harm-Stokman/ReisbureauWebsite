<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle reviews</title>
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
 <div class="reviews-index">
            <span class="title-block">Alle reviews</span>
            <a href="review.php"><button class="action-button">Review schrijven?</button></a>
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
                    <span>0/5</span>
                </div>
                <p>Kanker Vaygo</p>
            </div>
        </div>
    </main>
</body>
</html>