<?php
require_once __DIR__ . '/../core/Router.php';

// instance router
$router = new Router(); 

$router->add('/', 'HomeController@index');
$router->add('/products/{type}', 'ProductController@showProductsByType');
$router->add('/detail/{id}', 'ProductController@getProductById');
$router->add('/cart', 'CartController@showCart');
$router->add('/login', 'UserController@loginPage');
$router->add('/user/login', 'UserController@login');
$router->add('/user/logout', 'UserController@logout');
$router->add('/register', 'UserController@registerPage');
$router->add('/user/register', 'UserController@register');
$router->add('/logout', 'UserController@logout');
$router->add('/profile', 'UserController@profilePage');
$router->add('/add-to-cart', 'CartController@addToCart');
$router->add('/cart/remove/{id}', 'CartController@removeFromCart');

?>