<?php

declare(strict_types=1);

namespace Source\Infra\Services;

use Ramsey\Uuid\Uuid;
use Source\Domain\Interfaces\Services\UuidGeneratorInterface;

class RamseyUuidGenerator implements UuidGeneratorInterface
{
    public function isValid(string $uuid): bool
    {
        return Uuid::isValid($uuid);
    }

    public function generate(): string
    {
        $uuid = Uuid::uuid7();

        return $uuid->toString();
    }
}
