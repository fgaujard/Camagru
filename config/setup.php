<?php
require "./db.php";

//---------create database if not exist--------------------
try {
//db 1st connection
        $db_conn = new PDO($DB_DSN_INIT, $DB_USER, $DB_PASSWORD);
        $db_conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        
        $db_query = "CREATE DATABASE IF NOT EXISTS camagru";
        $db_conn->exec($db_query);
        echo "Your database camagru is created with success ! <br/><br/>";
} 
catch (PDOException $e) 
{
        die('Error : ' . $e->getMessage());
}

//---------create query tables of database-----------------

try
{
        $db_conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $db_conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        
        $create_users_tab = "CREATE TABLE IF NOT EXISTS `camagru`.`users` (
                            `id` INT NOT NULL AUTO_INCREMENT ,
                            `username` VARCHAR(50) NOT NULL ,
                            `email` VARCHAR(255) NOT NULL ,
                            `token` VARCHAR(255) NOT NULL ,
                            `verified` BOOLEAN NULL DEFAULT NULL ,
                            `password` VARCHAR(255) NOT NULL ,
                            `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                            PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        
        //$create_gallery_tab = "";
        //$create_comment_tab = "";
        //$create_like_tab = "";

//---------execute query tables of database----------------

        $db_conn->exec($create_users_tab);
        echo "Your table users is created with success ! <br/><br/>";
        
        //$db_conn->query($create_gallery_tab);
        //$db_conn->query($create_comment_tab);
        //$db_conn->query($create_like_tab);


//---------create admin user data--------------------------

        $username = "admin";
        $email = "admin@camagru.com";
        $token = bin2hex(random_bytes(50));
        $pass = password_hash(admin, PASSWORD_DEFAULT);

        $create_admin_user = "INSERT INTO `users` (`id`, `username`, `email`, `token`, `verified`, `password`, `create_date`) VALUES (NULL, '$username', '$mail', '1', '$token', '$pass', CURRENT_TIMESTAMP);";

//---------execute admin user data--------------------------

        $db_conn->exec($create_admin_user);
}
catch (PDOException $e)
{
        die('Error : ' . $e->getMessage());
}

?>