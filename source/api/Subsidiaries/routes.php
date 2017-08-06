<?php

$router->get('/subsidiaries', 'SubsidiaryController@getAll');
$router->get('/subsidiaries/by-company/{company_id?}', 'SubsidiaryController@getByCompanyId');
$router->get('/subsidiaries/{id}', 'SubsidiaryController@getById');
$router->post('/subsidiaries', 'SubsidiaryController@create');
$router->put('/subsidiaries/{id}', 'SubsidiaryController@update');
$router->delete('/subsidiaries/{id}', 'SubsidiaryController@delete');
