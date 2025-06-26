<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Services;

interface UuidGeneratorInterface
{
    public function isValid(string $uuid): bool;

    public function generate(): string;
}
