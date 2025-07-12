<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\ValueObjects\Slug;
use Source\Domain\ValueObjects\Title;
use Source\Domain\ValueObjects\Uuid;

final readonly class Page
{
    public function __construct(
        public Uuid $id,
        public Title $title,
        public Slug $slug,
        public Uuid $userId,
    ) {}
}
