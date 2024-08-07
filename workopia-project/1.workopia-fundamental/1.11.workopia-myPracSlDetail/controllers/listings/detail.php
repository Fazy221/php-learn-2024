<?php 
$config = require basePath('config/db.php');
$db = new Database($config);
$id = $_GET['id'] ?? 1;
$listing = $db->querySl('SELECT * FROM listings WHERE id = :id', $id)->fetchAll();
loadView("listings/detail", [
    'listing' => $listing
]);