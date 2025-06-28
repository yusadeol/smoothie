<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableString;
use Stringable;

final readonly class Uuid implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('UUID must be between 4 and 255 characters.');
        }

        $pattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-[1678][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i';
        if (preg_match($pattern, $value) !== 1) {
            return Error::parse('Invalid UUID format.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
