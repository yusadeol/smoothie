<?php

declare(strict_types=1);

namespace Source\Infra\Factories;

use Source\Domain\Interfaces\Services\UuidGeneratorInterface;
use Source\Infra\Services\RamseyUuidGenerator;

final class UuidGeneratorFactory
{
    public static function create(): UuidGeneratorInterface
    {
        return new RamseyUuidGenerator;
    }
}
