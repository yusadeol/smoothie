<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use CoffeeCode\Router\Router;
use Smarty\Smarty;

readonly class Controller
{
    protected Smarty $smarty;

    public function __construct(protected Router $router)
    {
        $smarty = new Smarty;
        $smarty->setTemplateDir(basePath('resources/views'));
        $smarty->setCompileDir(basePath('storage/smarty/compile'));
        $smarty->setCacheDir(basePath('storage/smarty/cache'));

        $smarty->setEscapeHtml(true);

        $this->smarty = $smarty;
    }
}
