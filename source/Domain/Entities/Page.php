<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Vo\Slug;
use Source\Domain\Vo\Title;
use Source\Domain\Vo\Uuid;

class Page
{
    public function __construct(
        public Uuid $id,
        public Title $title,
        public Slug $slug,
        public Uuid $userId
    ) {}
}
