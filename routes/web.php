<?php

use App\Http\Controllers\HomeController;
use CoffeeCode\Router\Router;

return function (Router $router) {
    $router->get('/', new HomeController($router), 'home');
};
