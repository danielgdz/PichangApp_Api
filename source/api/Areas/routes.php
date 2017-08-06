<?php

$router->get('/areas', 'AreaController@getAll');
$router->get('/areas/{id}', 'AreaController@getById');
$router->post('/areas', 'AreaController@create');
$router->put('/areas/{id}', 'AreaController@update');
$router->delete('/areas/{id}', 'AreaController@delete');
