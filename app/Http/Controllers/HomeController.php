<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke(): void
    {
        $this->smarty->assign('name', 'YSO Code');
        $this->smarty->display('home.tpl');
    }
}
