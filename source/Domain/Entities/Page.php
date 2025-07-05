<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Vo\Slug;
use Source\Domain\Vo\Title;
use Source\Domain\Vo\Uuid;

final class Page
{
    /**
     * @param  array<ComponentInterface>|null  $components
     */
    public function __construct(
        public readonly Uuid $id,
        public readonly Title $title,
        public readonly Slug $slug,
        public readonly Uuid $userId,
        public ?array $components = null
    ) {}
}
