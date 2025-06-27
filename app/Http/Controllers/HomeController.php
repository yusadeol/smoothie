<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Framework\Controller;

final readonly class HomeController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->assign('name', 'YSO Code');
        $this->smarty->display('home.tpl');
    }
}
