<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Fields\Size;

final readonly class Banner implements ComponentInterface
{
    public function __construct(
        public Size $size,
        public Image $image
    ) {}
}
