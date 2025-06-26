<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\VO\Slug;
use Source\Domain\VO\Title;
use Source\Domain\VO\Uuid;

class Page
{
    public function __construct(
        public Uuid $id,
        public Title $title,
        public Slug $slug,
        public User $author,
    ) {}
}
