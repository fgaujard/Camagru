<?php 
include 'config/authController.php';
include 'config/generate_header.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css' type='text/css'>
    <?php if ($_SESSION['verified']): ?>
            <title>Welcome to Gallery</title>
    <?php else: ?>
            <title>Login with success</title>
    <?php endif; ?>
</head>

<body>
    <div>
        <!-- display message -->
        <?php if (isset($_SESSION['message'])): ?>
        <div>
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
        <?php endif;?>
        <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
        <?php if (!$_SESSION['verified']): ?>
            <div role="alert">
                <p>You need to verify your email address!
                Sign into your email account and click
                on the verification link, we just emailed you
                at
                <strong><?php echo $_SESSION['email']; ?></strong></p>
            </div>
        <?php else: ?>
            <button>I'm verified !</button>
        <?php endif; ?>
    </div>
    <div>
        <?php 
        if ($_SESSION['verified'])
        {
            include 'config/generate_gallery.php';
        }
        ?>
    </div>
</body>
</html>
<!--gallery pics here-->