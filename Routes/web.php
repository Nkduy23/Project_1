<?php

use Core\Router;

$router = new Router();
$router->add('/', 'HomeController@index');
$router->add('/products/{type}', 'ProductController@showProductsByType');
$router->add('/detail/{id}', 'ProductController@getProductById');
$router->add('/comment', 'CommentController@addComment');
$router->add('/cart', 'CartController@showCart');
$router->add('/add-to-cart', 'CartController@addToCart');
$router->add('/cart/remove/{id}', 'CartController@removeFromCart');
$router->add('/update-cart', 'CartController@updateCart');
$router->add('/checkout', 'CartController@checkout');
$router->add('/checkout/process', 'CartController@checkoutProcess');
$router->add('/order/success', 'OrderController@success');
$router->add('/order/history', 'OrderController@history');
$router->add('/login', 'UserController@loginPage');
$router->add('/user/login', 'UserController@login');
$router->add('/user/logout', 'UserController@logout');
$router->add('/register', 'UserController@registerPage');
$router->add('/user/register', 'UserController@register');
$router->add('/logout', 'UserController@logout');
$router->add('/profile', 'UserController@profilePage');
