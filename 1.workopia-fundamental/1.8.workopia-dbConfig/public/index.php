<?php 
require('../helper.php');

// Import Database.php which includes class and config which incl our db details
require basePath('Database.php');
$config = require basePath('config/db.php');

// Will pass config in Database after it's insaniation. Since using constructor so db will be setup immediately after insaniation
$db = new Database($config);


require basePath('Router.php');


$router = new Router(); 

$routes = require basePath('routes.php'); 

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD']; 

$router->route($uri, $method);