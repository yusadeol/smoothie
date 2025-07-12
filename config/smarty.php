<?php

declare(strict_types=1);

use Source\Domain\ValueObjects\Key;

return [
    'modifier' => [
        'key' => fn (string $key): Key => new Key($key),
    ],
    'function' => [],
];
