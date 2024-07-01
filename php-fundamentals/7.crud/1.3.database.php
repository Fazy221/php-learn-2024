<?php 
$host = 'localhost';
$port = 3306;
$dbName = 'blog';
$username = 'faizan';
$password = 'gtasanandreas';

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ATTR means attribute. AFaik, 1st arg is setting attrib & 2nd arg is type of that attrib to set
    // Fetch in associated arr so don't have to do everytime when fetching as told in 1.2.lesson
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'Database Failure: ' . $e;
}