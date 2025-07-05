<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields\Interfaces;

use Source\Domain\Vo\Uuid;

interface FieldInterface
{
    public function __construct(
        Uuid $id,
        Uuid $ownerId,
        mixed $value
    );
}
