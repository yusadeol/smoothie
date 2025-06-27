<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Enums\ComponentChildType;
use Source\Domain\VO\Name;
use Source\Domain\VO\Uuid;

class ComponentChild
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public ComponentChildType $type,
        public Uuid $parentComponentId
    ) {}
}
