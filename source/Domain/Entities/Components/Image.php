<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Fields\Url;

final readonly class Image implements ComponentInterface
{
    public function __construct(
        public Url $url
    ) {}
}
