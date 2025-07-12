<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchPageBySlug;

use Source\Domain\ValueObjects\Slug;

final readonly class Input
{
    public function __construct(
        public Slug $pageSlug
    ) {}
}
