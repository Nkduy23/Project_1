<?php
use Core\Router;

$router = new Router();

$router->add('/admin', 'AdminController@index');
$router->add('/admin/products', 'AdminProductController@index');
$router->add('/admin/orders', 'AdminOrderController@index');    
$router->add('/admin/categories', 'AdminCategoryProductController@index');
$router->add('/admin/brands', 'AdminBrandController@index');
$router->add('/admin/customers', 'AdminCustomerController@index');
$router->add('/admin/comments', 'AdminCommentController@index');
$router->add('/admin/services', 'AdminServiceController@index');

?>