<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use Source\Domain\ValueObjects\Traits\ValidatableString;
use Stringable;

final readonly class Key implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Key must be between 4 and 255 characters.');
        }

        $pattern = '/^[a-z][a-z0-9_]*$/';
        if (in_array(preg_match($pattern, $value), [0, false], true)) {
            return Error::parse('Key must contain only lowercase letters, numbers and underscores.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
