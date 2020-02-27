<?php if ($_SESSION['id']): ?>
    <div id="header">
        <a href="./index.php">Camagru</a>
        <a href="./account_page.php">My Profile</a>
        <a href="./upload.php">Upload</a>
        <a href="./config/logout.php">Logout</a>
        </a>
    </div>
<?php else: ?>
    <div id="header">
        <a class="h_main_page" href="./index.php">Camagru</a>
        <a class="h_btn" href="./signup.php">Sign Up</a>
        <a class="h_btn2" href="./login.php">Login</a>
    </div>
<?php endif; ?>