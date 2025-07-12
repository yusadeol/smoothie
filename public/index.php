<?php

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

use CoffeeCode\Router\Dispatch;
use CoffeeCode\Router\Router;

$router = new Router('http://localhost/smoothie');

/** @var Closure $frameworkRoutes */
$frameworkRoutes = require_once basePath('/routes/error.php');

/** @var Closure $webRoutes */
$webRoutes = require_once basePath('/routes/web.php');

$frameworkRoutes($router);
$webRoutes($router);

$router->dispatch();

switch ($router->error()) {
    case Dispatch::BAD_REQUEST:
        $router->redirect('badRequest');
        break;
    case Dispatch::NOT_FOUND:
        $router->redirect('notFound');
        break;
    case Dispatch::METHOD_NOT_ALLOWED:
        $router->redirect('methodNotAllowed');
        break;
    case Dispatch::NOT_IMPLEMENTED:
        $router->redirect('notImplemented');
        break;
}
