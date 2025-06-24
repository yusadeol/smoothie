<?php

declare(strict_types=1);

use App\Http\Controllers\NotFoundController;
use CoffeeCode\Router\Router;

return function (Router $router): void {
    $router->get('/not-found', new NotFoundController($router), 'notFound');
};
