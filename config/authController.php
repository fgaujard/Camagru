<?php

require ("./db.php");
$errors = [];

//--------mail function----------------------------------

function    sendVerificationEmail($email, $token) 
{
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
    mail($email, $subject, $message, $headers); // Send our email 
    // Our message above including the link
}

//--------auth function----------------------------------

function    auth_user($username, $password)
{   
    try {
        $req = $db_conn->prepare("SELECT * FROM users WHERE username=? OR email=? AND password=? LIMIT 1");
        $req->execute(array(':username'=>$username, ':email'=>$email));
        $userRow = $req->fetch(PDO::FETCH_ASSOC);

        if($req->rowCount() > 0)
        {
            if (password_verify($password, $userRow['password'])) {
                $req->close();
                $_SESSION['id'] = $userRow['id'];
                $_SESSION['username'] = $userRow['username'];
                $_SESSION['email'] = $userRow['email'];
                $_SESSION['verified'] = $userRow['verified'];
                $_SESSION['message'] = 'You are logged in !';
                $_SESSION['type'] = 'alert-success';
                header('location : index.php');
                exit(0);
            } else {
                $errors['login_fail'] = "Wrong username or password";
                }
            }
        }
    catch (PDOException $e)
    {
        die('Error : ' . $e->getMessage());
    }
}

//--------create user function---------------------------

function    create_user($username, $email, $password)
{
    try {
            $stmt = $db_conn->prepare("SELECT username FROM users WHERE username = $username OR email= $email");
            $stmt->execute();
            if ($stmt->rowCount() > 0){
                $stmt->close();
                $errors['register_fail'] = "Email or username already used";
            } else {
                $token = bin2hex(random_bytes(50));
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $create_user = "INSERT INTO `users` (`id`, `username`, `email`, `token`, `verified`, `password`, `create_date`) VALUES (NULL, '$username', '$email', '0', '$token', '$hashPassword', CURRENT_TIMESTAMP);";
                $db_conn->exec($create_user);
                sendVerificationEmail($email, $token);

                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                $_SESSION['message'] = 'You are logged in !';
                $_SESSION['type'] = 'alert-success';
                header('location : index.php');
            }
    }
    catch (PDOException $e)
    {
        die('Error : ' . $e->getMessage());
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
    if (count($errors) === 0) 
    {
        auth_user($_POST['username'], $_POST["password"]);
    }
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
    if (count($errors) === 0) 
    {
        create_user($_POST["username"], $_POST["email"], $_POST["password"]);
    }
}

?>