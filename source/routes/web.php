<?php


$router->get('/page','DatabaseController@run');

$router->get('/','DashboardController@index');

$router->get('/page-error','DashboardController@error');

$router->get('/categories','CategoriesController@index');
$router->get('/categories/create','CategoriesController@create');
$router->post('/categories','CategoriesController@store');
$router->get('/categories/edit','CategoriesController@edit');
$router->post('/categories/update','CategoriesController@update');
$router->get('/categories/delete','CategoriesController@destroy');

$router->get('/products','ProductsController@index');
$router->get('/products/create','ProductsController@create');
$router->post('/products','ProductsController@store');
$router->get('/products/edit','ProductsController@edit');
$router->post('/products/update','ProductsController@update');
$router->get('/products/delete','ProductsController@destroy');
