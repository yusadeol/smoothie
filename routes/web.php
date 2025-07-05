<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageSlug;
use Source\Infra\Repositories\Memory\ComponentRepository;
use Source\Infra\Repositories\Memory\FieldRepository;
use Source\Infra\Repositories\Memory\PageRepository;
use Source\Infra\Repositories\Memory\SubComponentRepository;

return function (Router $router): void {
    $pageRepository = new PageRepository;
    $componentRepository = new ComponentRepository;
    $subComponentRepository = new SubComponentRepository;
    $fieldRepository = new FieldRepository;

    $fetchComponentsByPageSlug = new FetchComponentsByPageSlug(
        $pageRepository,
        $componentRepository,
        $subComponentRepository,
        $fieldRepository
    );

    $router->get(
        '/{slug}',
        new PageController($router, $fetchComponentsByPageSlug),
        'page'
    );

    $router->get('/', new HomeController($router), 'home');
};
