<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableString;
use Stringable;

final readonly class Label implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Label must be between 4 and 255 characters.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
