<head>
    <script src="scripts/script.js"></script>
</head>

<div class="header-links">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="reizen.php">Reizen</a></li>
            <li><a href="aboutus.php">About us</a></li>
        </ul>
    </nav>
</div>
<div class="buttons">
    <?php 
    
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true) {?>
        <button id='uitloggen' onclick="logoutConfirmation()">Uitloggen</button>
    <?php } else { ?>
        <button><a href="inlog.php">Login</a></button>
    <?php } ?>
    <button><a href="contact.php">Contact</a></button>
    <?php 
    
    if (isset($_SESSION['logged_in']) && $_SESSION['username'] == "Admin") {
        echo "<button><a href='admin.php'>Admin</a></button>";
    } else {
        echo "<button><a href='account.php'>Account</a></button>";
    }

    ?>
</div>
