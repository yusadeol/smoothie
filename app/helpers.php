<?php

function basePath(?string $path = null): string
{
    $basePath = dirname(__DIR__);
    if (!$path) {
        return $basePath;
    }
    return $basePath . $path;
}
