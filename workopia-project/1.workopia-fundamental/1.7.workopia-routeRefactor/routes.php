<?php 
/*
return [
    '/' => 'controllers/home.php',
    '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
    '404' => 'controllers/error/404.php' // get rid of this as no longer needed
];
*/


/** Updated way of doing stuff now through class. 
     * Current routes.php file is being imported in index.php so it already have access to router class methods 
     * Therefore we can directly use methods there like get, post, delete with $uri and $controllers as arg
*/
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');