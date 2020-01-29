<?php 
include 'controllers/authController.php';
include 'generate_header.php';
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css' type='text/css'>
    <title>Login with success</title>
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
        <a href="logout.php" style='color: red'>Logout</a>
        <?php if (!$_SESSION['verified']): ?>
            <div role="alert">
                You need to verify your email address!
                Sign into your email account and click
                on the verification link we just emailed you
                at
                <strong><?php echo $_SESSION['email']; ?></strong>
            </div>
        <?php else: ?>
            <button>I'm verified !</button>
        <?php endif; ?>
    </div>
</body>
</html>