<?php

declare(strict_types=1);

namespace App\Http\Controllers\Framework;

final readonly class NotFoundController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->display('framework/notFound.tpl');
    }
}
