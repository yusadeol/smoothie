<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\ValueObjects\FieldType;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;

final readonly class FieldDefinition
{
    public function __construct(
        public Key $name,
        public Label $label,
        public FieldType $expectedType
    ) {}
}
