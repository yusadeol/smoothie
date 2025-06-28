<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

final readonly class Input
{
    public function __construct(public string $pageSlug) {}
}
