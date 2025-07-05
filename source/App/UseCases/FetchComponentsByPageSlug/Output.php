<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Entities\Page;

final readonly class Output
{
    public function __construct(
        public Page $page
    ) {}
}
