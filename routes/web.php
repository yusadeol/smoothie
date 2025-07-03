<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use CoffeeCode\Router\Router;
use Source\Infra\Repositories\Memory\PageRepository;

return function (Router $router): void {
    $pageRepository = new PageRepository;

    $router->get(
        '/{slug}',
        new PageController($router, $pageRepository),
        'page'
    );

    $router->get('/', new HomeController($router), 'home');
};
