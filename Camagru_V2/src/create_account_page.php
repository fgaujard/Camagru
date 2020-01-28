<?php 
    session_start(); 
    require_once('../controllers/authController.php');
?>

<html>
    
    <head>
        <meta charset="UTF-8" >
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <title>Register</title>
    </head>
    
    <body>
        <div class="page">
            <div>
                <form action="create_account_page.php" method="post">
                    <h3>Register</h3>

                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" value = "<?php echo $username; ?>">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" value = "<?php echo $email; ?>">
                    </div>
                
                    <div>
                        <label for="password">Password</label>
                        <input type="text" name="password">
                    </div>

                    <div>
                        <label for="passwordConf">Confirm Password</label>
                        <input type="text" name="passwordConf">
                    </div>
                    
                    <div>
                        <button type="submit" name="signup-button">Sign Up</button>
                    </div>
                    
                    <p>Already a member? <a href="login_page.php">Sign in!</a></p>

                </form>
            </div>
        </div>
    </body>

</html>