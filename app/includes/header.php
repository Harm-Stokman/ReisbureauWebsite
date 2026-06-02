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
    
    if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] = true) {
        echo "<a href='logout.php'> Uitloggen </a>";
    } else {
       echo "<a href='inlog.php'>Login</a>";;
    }
    
    ?>
    <a href="contact.php">Contact</a>
    <a href="admin.php">Admin</a>
</div>
