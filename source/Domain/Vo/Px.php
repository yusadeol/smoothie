<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableInt;

final readonly class Px
{
    use ValidatableInt;

    private static function validate(int $value): true|Error
    {
        if ($value < 0) {
            return Error::parse('Px value must be non-negative.');
        }

        return true;
    }
}
