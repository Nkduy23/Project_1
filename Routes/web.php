<?php

use Core\Router;

$router = new Router();
$router->add('/', 'HomeController@index');
$router->add('/products/{type}', 'ProductController@showProductsByType');
$router->add('/contact/about', 'ContactController@contactPage');
$router->add('/contact/info', 'ContactController@contactInfo');
$router->add('/contact/news', 'ContactController@contactNews');
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
$router->add('/login', 'AuthController@loginPage');
$router->add('/user/login', 'AuthController@login');
$router->add('/user/logout', 'AuthController@logout');
$router->add('/register', 'AuthController@registerPage');
$router->add('/user/register', 'AuthController@register');
$router->add('/forget', 'AuthController@forgetPage');
$router->add('/logout', 'AuthController@logout');
$router->add('/profile', 'AuthController@profilePage');
$router->add('/change-password', 'AuthController@changePasswordPage');
