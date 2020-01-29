<?php include 'controllers/authController.php' ?>
<?php include 'generate_header.php' ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css' type='text/css'>
    <title>Sign Up Now !</title>
</head>
<body>
    <div class='container'>
        <h3>Register</h3>
        <?php if (count($errors) > 0): ?>
            <div class="alert">
                <?php foreach ($errors as $error): ?>
                <li>
                    <?php echo $error; ?>
                </li>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <form class ='form-container' action='signup.php' method='post'>
            <div>
                <label>Username</label>
                <input type='text' name='username' value='<?php echo $username; ?>'>
            </div>
            <div>
                <label>Email</label>
                <input type='text' name='email' value='<?php echo $email; ?>'>
            </div>
            <div>
                <label>Password</label>
                <input type='password' name='password'>
            </div>
            <div>
                <label>Password Confirm</label>
                <input type='password' name='passwordConf'>
            </div>
            <div>
                <button type='submit' name='signup-button'>Sign Up</button>
            </div>
        </form>
        <br>
        <p id='in-form-style'  id='in-form-style'>Aleady have an account ? <button onclick="window.location.href='login.php'">Login !</button></p>
    </div>
</body>
</html>