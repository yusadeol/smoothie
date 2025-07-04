<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields\Interfaces;

use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Vo\Uuid;

interface FieldInterface
{
    public function __construct(
        Uuid $id,
        Uuid $componentId,
        FieldDefinition $definition,
        mixed $value
    );
}
