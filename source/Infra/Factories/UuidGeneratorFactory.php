<?php

declare(strict_types=1);

namespace Source\Infra\Factories;

use Source\Domain\Interfaces\UuidGeneratorInterface;
use Source\Infra\Services\RamseyUuidGenerator;

final class UuidGeneratorFactory
{
    public static function create(): UuidGeneratorInterface
    {
        return new RamseyUuidGenerator;
    }
}
