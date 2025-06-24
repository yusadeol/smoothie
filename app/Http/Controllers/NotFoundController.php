<?php

namespace App\Http\Controllers;

class NotFoundController extends Controller
{
    public function __invoke(): void
    {
        echo 'error 404';
    }
}