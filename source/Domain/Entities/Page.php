<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\ValueObjects\Slug;
use Source\Domain\ValueObjects\Title;
use Source\Domain\ValueObjects\Uuid;

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
