<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Entities\Component;

final readonly class Output
{
    /**
     * @param  array<Component>  $components
     */
    public function __construct(
        public array $components
    ) {}
}
