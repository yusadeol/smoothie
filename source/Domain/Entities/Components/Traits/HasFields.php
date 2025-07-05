<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Traits;

use InvalidArgumentException;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;

trait HasFields
{
    public function getField(string $fieldClass): ?FieldInterface
    {
        $field = array_find($this->fields ?? [], fn ($field): bool => $field::class === $fieldClass);
        if (! $field instanceof FieldInterface) {
            throw new InvalidArgumentException("Field not found: {$fieldClass}");
        }

        return $field;
    }

    public function getFieldValue(string $fieldClass): mixed
    {
        return $this->getField($fieldClass)?->value;
    }
}
