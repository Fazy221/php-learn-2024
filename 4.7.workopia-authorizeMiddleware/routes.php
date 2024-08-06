<?php

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create', ['auth']); // adding middleware arr as 3rd arg for defining user's required role
$router->get('/listings/{id}', 'ListingController@show');
$router->post('/listings', 'ListingController@store', ['auth']); // add middleware
$router->delete('/listings/{id}', 'ListingController@destroy'); 
$router->get('/listings/edit/{id}', 'ListingController@edit', ['auth']); // add middleware
$router->put('/listings/{id}', 'ListingController@update', ['auth']); // add middleware

$router->get('/auth/register', 'UserController@create', ['guest']); // add middleware
$router->get('/auth/login', 'UserController@login', ['guest']); // add middleware

$router->post('/auth/register', 'UserController@store', ['guest']); // add middleware
$router->post('/auth/logout', 'UserController@logout', ['auth']); // add middleware
$router->post('/auth/login', 'UserController@authenticate', ['guest']); // add middleware