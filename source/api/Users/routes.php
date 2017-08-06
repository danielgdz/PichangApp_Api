<?php

$router->get('/users', 'UserController@getAll');
$router->get('/users/get-sidebar/{app_id?}/{role_id?}', 'UserController@getSidebar');
$router->get('/users/{id}', 'UserController@getById');
$router->post('/users', 'UserController@create');
$router->post('/users/login', 'UserController@login');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@delete');
