<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableString;
use Stringable;

final readonly class Url implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        if (! filter_var($value, FILTER_VALIDATE_URL)) {
            return Error::parse('Invalid URL format.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
