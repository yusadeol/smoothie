<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use CoffeeCode\Router\Router;

return function (Router $router): void {
    $router->get('/', new HomeController($router), 'home');
};
