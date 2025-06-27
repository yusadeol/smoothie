<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Enums\ComponentFieldType;
use Source\Domain\VO\Name;
use Source\Domain\VO\Uuid;

class ComponentField
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public string $value,
        public ComponentFieldType $type,
        public Uuid $componentId
    ) {}
}
