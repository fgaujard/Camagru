<!-- php part of login-->
<?php 
session_start(); 
require_once('controllers/authController.php');








?>

<!-- html part of login-->

<html>
    
    <head>
        <meta charset="UTF-8" >
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Login</title>
    </head>
    
    <body>
        <div class="page">
            <?php include("./generate_header.php"); ?>
            <div>
                <form action="login_page.php" method="post">
                    <h3>Login</h3>

                    <div>
                        <label for="username">Username or Email</label>
                        <input type="text" name="username">
                    </div>
                
                    <div>
                        <label for="password">Password</label>
                        <input type="text" name="password">
                    </div>
                    
                    <div>
                        <button type="submit" name="signup-button">Login</button>
                    </div>
                    
                    <p>Don't have an account? <a href="create_account_page.php">Sign Up!</a></p>
                    
                </form>
            </div>
        </div>
    </body>

</html>