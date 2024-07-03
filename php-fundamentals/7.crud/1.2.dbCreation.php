<?php 

// DB Creds
$host = 'localhost';
$port = 3306;
$dbName = 'blog';
$username = 'faizan';
$password = 'gtasanandreas';

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try{
    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set PDO to throw err on exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'DB Connected...';
} catch(PDOException $e) {
    echo 'Database Failure: ' . $e;
}