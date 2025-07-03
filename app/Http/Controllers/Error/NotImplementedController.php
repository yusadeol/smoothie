<?php

declare(strict_types=1);

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

final readonly class NotImplementedController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('framework/error/notImplemented.tpl');
    }
}
