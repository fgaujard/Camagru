<?php include 'config/authController.php' ?>
<?php include 'config/generate_header.php' ?>
<?php
if ($_SESSION['id'])
{
    header('location : index.php');
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css' type='text/css'>
    <title>Login Now !</title>
</head>
<body>
    <div class='container'>
        <h3>Login</h3>
        <?php if (count($errors) > 0): ?>
            <div class="alert">
                <?php foreach ($errors as $error): ?>
                <li>
                    <?php echo $error; ?>
                </li>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <form action='login.php' method='post'>
            <div>
                <label>Username or Email</label>
                <input type='text' name='username' value='<?php echo $username; ?>'>
            </div>
            <div>
                <label>Password</label>
                <input type='password' name='password'>
            </div>
            <div>
                <button type='submit' name='login-button'>Login</button>
            </div>
        </form>
        <br>
        <p id='in-form-style'>Don't yet have an account ? <button onclick="window.location.href='signup.php'">Sign Up !</button></p>
    </div>
</body>
</html>