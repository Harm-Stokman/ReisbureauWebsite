<?php 

include_once 'includes/pdo.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="travels">
        <?php 
        
        $sql= "SELECT * FROM Reizen";
        $searchStatement = $pdo->prepare($sql);
        $searchStatement->execute();
        
        $reizen = $searchStatement->fetchAll();

        foreach ($reizen as $reis) { ?>
        <div class="admin-block">
            <img src="img/<?php echo $reis['Vlag']?>" alt="Afbeelding van vlag">
            <div class="travel-names">
            <?php echo $reis['Bestemming'];
            echo "<br>";
            echo $reis['Land'];
            ?>
            </div>

            <div class="admin-actions">
                <a> <button>Edit</button> </a>
                <a> <button>Delete</button> </a>
            </div>
        </div>
       <?php } ?>
        
        
    




    </div>
</body>
</html>