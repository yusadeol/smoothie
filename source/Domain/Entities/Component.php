<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Enums\ComponentType;
use Source\Domain\VO\Name;
use Source\Domain\VO\Uuid;

class Component
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public ComponentType $type,
        public Uuid $pageId
    ) {}
}
