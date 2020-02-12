<?php

require ("./db.php");
$errors = [];

//--------mail function----------------------------------

function    sendVerificationEmail($email, $token) 
{
    $to = $email;
    $subject = 'Signup verification';
    $message = "
    
    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
    ------------------------
    Username: '.$name.'
    Password: '.$password.'
    ------------------------
 
    Please click this link to activate your account:
    http://localhost:8080/verify.php?email='.$email.'&hash='.$token'
 
    ";
    $headers = 'From:noreply@camagru.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email 
    // Our message above including the link
}

//--------auth function----------------------------------

function    auth_user($username, $password)
{
    if (count($errors) === 0) 
    {
        $req = $db_conn->prepare("SELECT * FROM users WHERE username=? OR email=? AND password=? LIMIT 1");
//        $req = "";
        
        if (password_verify($password, $users['password'])) {
//            $stmt->close();

            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $users['verified'];
            $_SESSION['message'] = 'You are logged in !';
            $_SESSION['type'] = 'alert-success';
            header('location : index.php');
            exit(0);
        } else {
            $errors['login_fail'] = "Wrong username or password";
        }
    }
}

//--------create user function---------------------------

function    create_user($username, $email, $password, $passwordConf)
{
    if (count($errors) === 0) 
    {
        $token = bin2hex(random_bytes(50));
        $password = password_hash($_post['password'], PASSWORD_DEFAULT);

        //Check if email exists
//        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
//        if (  ($result) > 0) {
//            $errors['email'] = 'Email already used';
//       }

        //Check if username exists
//        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
//        if (  ($result) > 0) {
//            $errors['username'] = 'Sorrry this username already exists';
//        }
    }
}

//----press login button---------------------------------

if (isset($_POST['login-button'])) 
{
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    auth_user($_POST['username'], $_POST["password"]);
}

//----press signup button--------------------------------

if (isset($_POST['signup-button'])) 
{
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }
    create_user($_POST["username"], $_POST["email"], $_POST["password"], $_POST["passwordConf"]);
}

?>