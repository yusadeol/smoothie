<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields;

use Source\Domain\Enums\Size as SizeEnum;

class Size
{
    public function __construct(public SizeEnum $size) {}
}
