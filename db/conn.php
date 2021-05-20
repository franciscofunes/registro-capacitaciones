<?php 
//Development connection
//$host= 'localhost';
//$db = 'attendance';
//$user = 'root';
//$pass = '';
//$charset= 'utf8mb4';

//Remote database connection
$host= 'remotemysql.com';
$db = '6rPOM665X0';
$user = '6rPOM665X0'; 
$pass = 'cfhVAGe0rg';
$charset= 'utf8mb4';


    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());        
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","1234soyfrancisco");
?>


