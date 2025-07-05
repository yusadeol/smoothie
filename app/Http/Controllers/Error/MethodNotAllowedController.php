<?php

declare(strict_types=1);

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

final readonly class MethodNotAllowedController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('error/methodNotAllowed.tpl');
    }
}
