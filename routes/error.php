<?php

declare(strict_types=1);

use App\Http\Controllers\Error\BadRequestController;
use App\Http\Controllers\Error\MethodNotAllowedController;
use App\Http\Controllers\Error\NotFoundController;
use App\Http\Controllers\Error\NotImplementedController;
use CoffeeCode\Router\Router;

return function (Router $router): void {
    $router->get('/bad-request', new BadRequestController($router), 'badRequest');
    $router->get('/not-found', new NotFoundController($router), 'notFound');
    $router->get('/method-not-allowed', new MethodNotAllowedController($router), 'methodNotAllowed');
    $router->get('/not-implemented', new NotImplementedController($router), 'notImplemented');
};
