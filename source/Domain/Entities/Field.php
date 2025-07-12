<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use InvalidArgumentException;
use Source\Domain\ValueObjects\Uuid;

final readonly class Field
{
    public mixed $value;

    public function __construct(
        public Uuid $id,
        public Uuid $componentId,
        public FieldDefinition $definition,
        mixed $value
    ) {
        if (! ($value instanceof $this->definition->expectedType->value)) {
            throw new InvalidArgumentException("Value must implement {$this->definition->expectedType->value}");
        }

        $this->value = $value;
    }
}
