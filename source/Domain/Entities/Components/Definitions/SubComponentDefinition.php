<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Definitions;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;

final readonly class SubComponentDefinition
{
    /**
     * @param  class-string<ComponentInterface>  $component
     */
    public function __construct(
        public string $component,
        public int $max = 10,
        public int $min = 1
    ) {}
}
