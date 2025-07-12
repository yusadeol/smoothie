<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\QuantityRange;

final class SubComponentDefinition
{
    public Key $name {
        get => $this->componentDefinition->name;
    }

    public Label $label {
        get => $this->componentDefinition->label;
    }

    public function __construct(
        private readonly ComponentDefinition $componentDefinition,
        public readonly QuantityRange $quantityRange
    ) {}

    public function getFieldDefinition(Key $name): FieldDefinition
    {
        return $this->componentDefinition->getFieldDefinition($name);
    }

    /**
     * @return array<string, FieldDefinition>
     */
    public function getFieldDefinitions(): array
    {
        return $this->componentDefinition->getFieldDefinitions();
    }

    public function hasFieldDefinition(Key $name): bool
    {
        return $this->componentDefinition->hasFieldDefinition($name);
    }

    public function getSubComponentDefinition(Key $name): SubComponentDefinition
    {
        return $this->componentDefinition->getSubComponentDefinition($name);
    }

    /**
     * @return array<string, SubComponentDefinition>
     */
    public function getSubComponentDefinitions(): array
    {
        return $this->componentDefinition->getSubComponentDefinitions();
    }

    public function hasSubComponentDefinition(Key $name): bool
    {
        return $this->componentDefinition->hasSubComponentDefinition($name);
    }
}
