<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields\Interfaces;

use Source\Domain\ValueObjects\Uuid;

interface FieldInterface
{
    public Uuid $id { get; set; }

    public Uuid $ownerId { get; set; }

    public mixed $value { get; set; }
}
