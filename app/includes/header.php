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
    
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true) {
        echo "<a href='logout.php'> Uitloggen </a>";
    } else {
       echo "<a href='inlog.php'>Login</a>";;
    }
    
    ?>
    <a href="contact.php">Contact</a>
    <?php 
    
    if (isset($_SESSION['logged_in']) && $_SESSION['username'] == "Admin") {
        echo "<a href='admin.php'> Admin </a>";
    } else {
         echo "<a href='account.php'> Account </a>";
    }

    ?>
</div>
