<?php

declare(strict_types=1);

use App\Http\Controllers\Framework\BadRequestController;
use App\Http\Controllers\Framework\MethodNotAllowedController;
use App\Http\Controllers\Framework\NotFoundController;
use App\Http\Controllers\Framework\NotImplementedController;
use App\Http\Controllers\Framework\PageController;
use CoffeeCode\Router\Router;
use Source\Infra\Repositories\Memory\ComponentChildRepository;
use Source\Infra\Repositories\Memory\ComponentRepository;
use Source\Infra\Repositories\Memory\PageRepository;

return function (Router $router): void {
    $pageRepository = new PageRepository;
    $componentRepository = new ComponentRepository;
    $componentChildRepository = new ComponentChildRepository;

    $router->get(
        '/{slug}',
        new PageController($router, $pageRepository, $componentRepository, $componentChildRepository),
        'page'
    );

    $router->get('/bad-request', new BadRequestController($router), 'badRequest');
    $router->get('/not-found', new NotFoundController($router), 'notFound');
    $router->get('/method-not-allowed', new MethodNotAllowedController($router), 'methodNotAllowed');
    $router->get('/not-implemented', new NotImplementedController($router), 'notImplemented');
};
