<?php 
require('../helper.php');

require basePath('Router.php');
require basePath('Database.php');


$router = new Router(); 

$routes = require basePath('routes.php'); 

// $uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// inspect($uri);
$method = $_SERVER['REQUEST_METHOD']; 

$router->route($uri, $method);