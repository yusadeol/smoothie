<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchPageBySlug;

use Source\Domain\Entities\Page;

final readonly class Output
{
    public function __construct(
        public Page $page
    ) {}
}
