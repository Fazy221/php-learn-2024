<?php 
require('../helper.php');

// require basePath('Framework/Router.php');
// require basePath('Framework/Database.php');

spl_autoload_register(function ($class) {
    $path = basePath('Framework/' . $class . '.php');
    if(file_exists($path)) {
        require $path;
    }
});

$test = new Test();


$router = new Router(); 

$routes = require basePath('routes.php'); 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD']; 

$router->route($uri, $method);