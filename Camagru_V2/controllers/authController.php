<?php

require '../config/db.php';

$errors = array();
$username = "";
$email = "";



//if the user click of sign up button

if (isset($_POST['signup-button'])) {
    $username = $POST['username'];
    $email = $POST['email'];
    $password = $POST['password'];
    $passwordCof = $POST['passwordConf'];

    //validation
    if (empty($username)) {
        $errors['username'] = "Need username valid.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email adress is invalid.";
    }

    if (empty($email)) {
        $errors['email'] = "Need email.";
    }

    if (empty($password)) {
        $errors['password'] = "Need password.";
    }

    if ($password !== $passwordConf) {
        $errors['passwordConf'] = "Password don't match.";
    }

    $emailQuery = "SELECT * FORM users WHERE email= ? LIMIT 1";
    $statment = $connection->prepare($emailQuery);
    $statment->bind_param('s', $email);
    $statment->execute();
    $result = $statment->get_result();
    $userCount = $result->num_rows;

    if ($userCount > 0 ) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors ) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
        $statment = $connection->prepare($sql);
        $statment->bind_param('ssbss', $username, $email, $verified, $token, $password);
        
        if ($statment->execute()) {
            //login user
            $user_id = $connection->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;
            //flash message
            $_SESSION['message'] = "You are now loggedd in !";
            exit();
        }
        else {
            $errors['db_errors'] = "Database error: failed to register";
        }
    }
}
?>