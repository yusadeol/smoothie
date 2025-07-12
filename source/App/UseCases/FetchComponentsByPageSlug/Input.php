<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\ValueObjects\Uuid;

final readonly class Input
{
    public function __construct(public Uuid $pageId) {}
}
