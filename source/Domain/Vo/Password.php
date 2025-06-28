<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableString;
use Stringable;

final readonly class Password implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Password must be between 4 and 255 characters.');
        }

        return true;
    }

    public function hash(): PasswordHashed
    {
        $hashed = password_hash($this->value, PASSWORD_DEFAULT);

        return PasswordHashed::parse($hashed);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
