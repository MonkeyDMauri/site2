<?php


$dsn = "mysql:host=localhost;dbname=site2";
$db_username = "root";
$db_pwd = "1234";

try {
    $pdo = new PDO($dsn, $db_username, $db_pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Error when connecting to database: dbh.php");
}