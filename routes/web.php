<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageId;
use Source\App\UseCases\FetchPageBySlug\FetchPageBySlug;
use Source\Infra\Repositories\Memory\ComponentRepository;
use Source\Infra\Repositories\Memory\FieldRepository;
use Source\Infra\Repositories\Memory\PageRepository;

return function (Router $router): void {
    $pageRepository = new PageRepository;
    $fieldRepository = new FieldRepository;
    $componentRepository = new ComponentRepository($fieldRepository);

    $fetchPageBySlug = new FetchPageBySlug($pageRepository);

    $fetchComponentsByPageSlug = new FetchComponentsByPageId($componentRepository);

    $router->get(
        '/{slug}',
        new PageController($router, $fetchPageBySlug, $fetchComponentsByPageSlug),
        'page'
    );

    $router->get('/', new HomeController($router), 'home');
};
