<?php
if ($_SESSION['is_logged']):
?>
    <div id="header">
        <a href="./index.php">Camagru</a>
        <a href="./account_page.php">My Profile</a>
        <a href="./upload_page.php">Upload</a>
        <a href="./logout.php">Logout</a>
        </a>
    </div>
<?php else: ?>
    <div id="header">
        <a class="h_main_page" href="./index.php">Camagru</a>
        <a class="h_btn" href="./signup.php">Sign Up</a>
        <a class="h_btn2" href="./login.php">Login</a>
    </div>
<?php endif; ?>