<?php

declare(strict_types=1);

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

final readonly class BadRequestController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('error/badRequest.tpl');
    }
}
