<?php

declare(strict_types=1);

namespace App\Http\Controllers\Framework;

final readonly class MethodNotAllowedController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('framework/methodNotAllowed.tpl');
    }
}
