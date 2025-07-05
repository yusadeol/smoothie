<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use Source\Domain\ValueObjects\Traits\ValidatableString;
use Stringable;

final readonly class Email implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return Error::parse('Invalid email format.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
