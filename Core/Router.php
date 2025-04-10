<?php

namespace Core;

use Exception;

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Controllers\CommentController;

use Admin\Controllers\AdminController;
use Admin\Controllers\AdminProductController;
use Admin\Controllers\AdminCustomerController;


class Router
{
    private $routes = [];

    public function add($route, $controllerAction)
    {
        $this->routes[$route] = $controllerAction;
        // $this->routes[/home] = HomeController@index;
    }

    public function dispatch($uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        $uri = $uri === '' ? '/' : $uri;

        foreach ($this->routes as $route => $controllerAction) {

            $routePattern = preg_replace('/\{type\}/', '([a-zA-Z]+)', str_replace('/', '\/', $route));
            $routePattern = preg_replace('/\{id\}/', '(\d+)', $routePattern);

            if (preg_match('/^' . $routePattern . '$/', $uri, $matches)) {
                array_shift($matches);

                $controllerAction = explode('@', $controllerAction);
                $controllerName = $controllerAction[0];
                $methodName = $controllerAction[1];

                if (str_starts_with($controllerName, 'Admin')) {
                    $controllerFile = __DIR__ . '/../Admin/Controllers/' . $controllerName . '.php';
                } else {
                    $controllerFile = __DIR__ . '/../App/Controllers/' . $controllerName . '.php';
                }

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;

                    $controller = $this->createController($controllerName);

                    if (method_exists($controller, $methodName)) {
                        call_user_func_array([$controller, $methodName], $matches); // Truyền tham số ID vào method
                    } else {
                        http_response_code(404);
                        echo json_encode(["error" => "Method $methodName not found in controller $controllerName"]);
                        return;
                    }
                } else {
                    http_response_code(404);
                    echo json_encode(["error" => "Controller $controllerName not found"]);
                }
                return;
            }
        }

        http_response_code(404);
        echo json_encode(["error" => "Route $uri not found"]);
    }


    // Hàm factory để tạo controller với dependencies injection
    public static function createController($controllerName)
    {
        $dependenciesPath  = __DIR__ . '/../Config/dependencies.php';

        if (!file_exists($dependenciesPath)) {
            throw new Exception("Dependencies file not found");
        }

        $dependencies = require $dependenciesPath;

        if (!is_array($dependencies)) {
            throw new Exception("Dependencies file must return an array");
        }

        switch ($controllerName) {
            case 'HomeController':
                return new HomeController(
                    $dependencies['mediaModel'],
                    $dependencies['productModel'],
                    $dependencies['brandModel'],
                    $dependencies['newsModel']
                );
            case 'ProductController':
                return new ProductController(
                    $dependencies['productModel'],
                    $dependencies['commentModel']
                );
            case 'CartController':
                return new CartController(
                    $dependencies['cartModel'],
                    $dependencies['db']
                );
            case 'UserController':
                return new UserController(
                    $dependencies['userModel'],
                    $dependencies['cartModel']
                );
            case 'OrderController':
                return new OrderController();
            case 'CommentController':
                return new CommentController($dependencies['commentModel']);
            case 'AdminController':
                return new AdminController();
            case 'AdminProductController':
                return new AdminProductController(
                    $dependencies['adminProductModel']
                );
            case 'AdminCustomerController':
                return new AdminCustomerController(
                    $dependencies['adminCustomerModel']
                );
            default:
                throw new Exception("Controller $controllerName not found");
        }
    }
}
