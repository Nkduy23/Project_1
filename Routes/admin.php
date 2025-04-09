<?php
use Core\Router;

$router = new Router();

$router->add('/admin', 'AdminController@index');
$router->add('/admin/products', 'AdminProductController@index');
$router->add('/admin/products/{id}', 'AdminProductController@getProductById');
$router->add('/admin/customers', 'AdminCustomerController@index');

?>