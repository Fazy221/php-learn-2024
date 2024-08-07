<?php 
use Framework\Database;
$config = require basePath('config/db.php');
$db = new Database($config);
$id = $_GET['id'] ?? '';
$params = [
    'id' => $id
];
$listing = $db->query('SELECT * FROM listings WHERE id = :id ', $params)->fetch(); // As put :id, second arg is array in which it'll find key by same name as :id then extract it's value to put in place of :id

// inspect($listing); 
loadView('listings/show', [
    'listing'=>$listing
]);