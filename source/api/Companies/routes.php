<?php

$router->get('/companies', 'CompanyController@getAll');
$router->get('/companies/{id}', 'CompanyController@getById');
$router->get('/companies/by-app/{appId}', 'CompanyController@getByAppId');
$router->post('/companies', 'CompanyController@create');
$router->put('/companies/{id}', 'CompanyController@update');
$router->delete('/companies/{id}', 'CompanyController@delete');
