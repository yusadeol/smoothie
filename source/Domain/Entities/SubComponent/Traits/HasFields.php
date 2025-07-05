<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent\Traits;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;

trait HasFields
{
    public function getField(string $fieldClass): ?FieldInterface
    {
        return array_find($this->fields ?? [], fn ($field): bool => $field::class === $fieldClass);
    }
}
