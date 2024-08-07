<?php 

$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
// $router->get('/listings?id=1', 'controllers/listings/detail.php');
$router->get('/listings/:id', 'controllers/listings/detail.php');