<?php

declare(strict_types=1);

use Source\Domain\ValueObjects\Key;

return [
    'modifier' => [
        'key' => fn (string $key): Key => new Key($key),
    ],
    'function' => [
        'asset' => function (array $params): string {
            $path = $params['path'] ?? null;
            if (! is_string($path) || ($path === '' || $path === '0')) {
                throw new InvalidArgumentException('Path must be a string or null.');
            }

            return "assets/{$path}";
        },
    ],
];
