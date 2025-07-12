<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use InvalidArgumentException;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;

final readonly class ComponentDefinition
{
    /** @var array<string, FieldDefinition> */
    private array $fieldDefinitions;

    /** @var array<string, ComponentDefinition> */
    private array $subComponentDefinitions;

    /**
     * @param  array<FieldDefinition>  $fieldDefinitions
     * @param  array<ComponentDefinition>  $subComponentDefinitions
     */
    public function __construct(
        public Key $name,
        public Label $label,
        array $fieldDefinitions = [],
        array $subComponentDefinitions = []
    ) {
        $this->fieldDefinitions = $this->filterFieldDefinitions($fieldDefinitions);
        $this->subComponentDefinitions = $this->filterSubComponentDefinitions($subComponentDefinitions);
    }

    /**
     * @param  array<FieldDefinition>  $fieldDefinitions
     * @return array<string, FieldDefinition>
     */
    private function filterFieldDefinitions(array $fieldDefinitions): array
    {
        $validatedFieldDefinitions = [];
        foreach ($fieldDefinitions as $fieldDefinition) {
            $validatedFieldDefinitions[(string) $fieldDefinition->name] = $fieldDefinition;
        }

        return $validatedFieldDefinitions;
    }

    /**
     * @param  array<ComponentDefinition>  $subComponentDefinitions
     * @return array<string, ComponentDefinition>
     */
    private function filterSubComponentDefinitions(array $subComponentDefinitions): array
    {
        $validatedSubComponentDefinitions = [];
        foreach ($subComponentDefinitions as $subComponentDefinition) {
            $validatedSubComponentDefinitions[(string) $subComponentDefinition->name] = $subComponentDefinition;
        }

        return $validatedSubComponentDefinitions;
    }

    public function getFieldDefinition(Key $name): FieldDefinition
    {
        $fieldDefinition = $this->fieldDefinitions[(string) $name] ?? null;
        if (! $fieldDefinition) {
            throw new InvalidArgumentException("FieldDefinition '{$name}' not found.");
        }

        return $fieldDefinition;
    }

    /**
     * @return array<string, FieldDefinition>
     */
    public function getFieldDefinitions(): array
    {
        return $this->fieldDefinitions;
    }

    public function hasFieldDefinition(Key $name): bool
    {
        return array_key_exists((string) $name, $this->fieldDefinitions);
    }

    public function getSubComponentDefinition(Key $name): ComponentDefinition
    {
        $subComponentDefinitions = $this->subComponentDefinitions[(string) $name] ?? null;
        if (! $subComponentDefinitions) {
            throw new InvalidArgumentException("SubComponentDefinition '{$name}' not found.");
        }

        return $subComponentDefinitions;
    }

    /**
     * @return array<string, ComponentDefinition>
     */
    public function getSubComponentDefinitions(): array
    {
        return $this->subComponentDefinitions;
    }

    public function hasSubComponentDefinition(Key $name): bool
    {
        return array_key_exists((string) $name, $this->subComponentDefinitions);
    }
}
