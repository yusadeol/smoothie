<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use DomainException;
use InvalidArgumentException;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Uuid;

final readonly class Component
{
    /** @var array<string, Field> */
    private array $fields;

    /** @var array<string, array<Component>> */
    private array $subComponents;

    /**
     * @param  array<Field>  $fields
     * @param  array<Component>  $subComponents
     */
    public function __construct(
        public Uuid $id,
        public Uuid $pageId,
        public ComponentDefinition|SubComponentDefinition $definition,
        array $fields = [],
        array $subComponents = [],
        public ?Uuid $parentId = null
    ) {
        $this->fields = $this->filterFields($fields);
        $this->validateRequiredFields();
        $this->subComponents = $this->filterSubComponents($subComponents);
        $this->validateRequiredSubComponents();
    }

    /**
     * @param  array<Field>  $fields
     * @return array<string, Field>
     */
    private function filterFields(array $fields): array
    {
        $validatedFields = [];
        foreach ($fields as $field) {
            if ($this->definition->hasFieldDefinition($field->definition->name)) {
                $validatedFields[(string) $field->definition->name] = $field;
            }
        }

        return $validatedFields;
    }

    private function validateRequiredFields(): void
    {
        foreach (array_keys($this->definition->getFieldDefinitions()) as $name) {
            if (! array_key_exists($name, $this->fields)) {
                throw new DomainException("Field '{$name}' does not exist.");
            }
        }
    }

    /**
     * @param  array<Component>  $subComponents
     * @return array<string, array<Component>>
     */
    private function filterSubComponents(array $subComponents): array
    {
        $validatedSubComponents = [];
        foreach ($subComponents as $subComponent) {
            if ($this->definition->hasSubComponentDefinition($subComponent->definition->name)) {
                $validatedSubComponents[(string) $subComponent->definition->name][] = $subComponent;
            }
        }

        return $validatedSubComponents;
    }

    private function validateRequiredSubComponents(): void
    {
        foreach ($this->definition->getSubComponentDefinitions() as $name => $subComponentDefinition) {
            $subComponent = $this->subComponents[$name] ?? null;

            $count = is_array($subComponent) ? count($subComponent) : 0;
            $min = $subComponentDefinition->quantityRange->min;
            $max = $subComponentDefinition->quantityRange->max;

            if ($count < $min) {
                throw new DomainException(
                    "Subcomponent '{$name}' requires at least {$min} instance(s), found {$count}."
                );
            }

            if ($count > $max) {
                throw new DomainException(
                    "Subcomponent '{$name}' allows at most {$max} instance(s), found {$count}."
                );
            }
        }
    }

    public function getField(Key $name): Field
    {
        $field = $this->fields[(string) $name] ?? null;
        if (! $field) {
            throw new InvalidArgumentException("Field '{$name}' not found.");
        }

        return $field;
    }

    public function hasField(Key $name): bool
    {
        return array_key_exists((string) $name, $this->fields);
    }

    /**
     * @return array<Component>
     */
    public function getSubComponents(Key $name): array
    {
        $subComponent = $this->subComponents[(string) $name] ?? null;
        if (! $subComponent) {
            throw new InvalidArgumentException('No subcomponents found.');
        }

        return $subComponent;
    }

    public function hasSubComponent(Key $name): bool
    {
        return array_key_exists((string) $name, $this->subComponents);
    }
}
