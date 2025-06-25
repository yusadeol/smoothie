<?php

declare(strict_types=1);

namespace App\Http\Controllers\Framework;

class BadRequestController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('framework/badRequest.tpl');
    }
}
