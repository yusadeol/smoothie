<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageSlug;
use Source\Infra\Repositories\Memory\PageRepository;

return function (Router $router): void {
    $pageRepository = new PageRepository;

    $fetchComponentsByPageSlug = new FetchComponentsByPageSlug($pageRepository);

    $router->get(
        '/{slug}',
        new PageController($router, $fetchComponentsByPageSlug),
        'page'
    );

    $router->get('/', new HomeController($router), 'home');
};
