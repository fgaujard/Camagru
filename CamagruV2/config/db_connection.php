<?php
require "./db.php";
try
{
        $db_conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $db_conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        return $db_conn;
        session_start();
}
catch (PDOException $e)
{
        die('Error : ' . $e->getMessage());
}
?>