<?php 
require '../helper.php';
$routers = [
    '/' => 'controllers/home.php',
    '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
    '404' => 'controllers/errors/404.php'
];

$uri = $_SERVER['REQUEST_URI'];
if(array_key_exists($uri, $routers)) {
    require(basePath($routers[$uri]));
} else {
    require basePath($routers['404']);
}