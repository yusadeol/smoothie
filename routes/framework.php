<?php

use App\Http\Controllers\NotFoundController;
use CoffeeCode\Router\Router;

return function (Router $router) {
    $router->get('/not-found', new NotFoundController($router), 'notFound');
};
