<?php

use Source\Domain\ValueObjects\Key;

return [
    'modifier' => [
        'key' => fn (string $key) => new Key($key),
    ],
    'function' => [],
];
