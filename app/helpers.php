<?php

declare(strict_types=1);

function basePath(?string $path = null): string
{
    $basePath = dirname(__DIR__);
    if (! is_string($path) || ($path === '' || $path === '0')) {
        return $basePath;
    }

    return $basePath.'/'.$path;
}
