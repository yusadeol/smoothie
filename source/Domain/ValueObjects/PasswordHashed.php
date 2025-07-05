<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use Source\Domain\ValueObjects\Traits\ValidatableString;
use Stringable;

final readonly class PasswordHashed implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Password must be between 4 and 255 characters.');
        }

        if (mb_strlen($value) < 60 || preg_match('/^\$2[ayb]\$.{56}$/', $value) !== 1) {
            return Error::parse('Invalid password hash format.');
        }

        return true;
    }

    public function verify(Password $plain): bool
    {
        return password_verify((string) $plain, $this->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
