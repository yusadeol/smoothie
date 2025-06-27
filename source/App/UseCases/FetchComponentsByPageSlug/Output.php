<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

class Output
{
    /**
     * @param  array<array<string>>  $components
     */
    public function __construct(public array $components) {}
}
