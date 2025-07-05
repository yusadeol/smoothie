<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use InvalidArgumentException;
use Stringable;

final readonly class PasswordHashed implements Stringable
{
    public string $value;

    public function __construct(
        string $value
    ) {
        $isValid = self::validate($value);
        if ($isValid instanceof Error) {
            throw new InvalidArgumentException((string) $isValid);
        }

        $this->value = $value;
    }

    public static function isValid(string $value): bool
    {
        return self::validate($value) === true;
    }

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return new Error('Password must be between 4 and 255 characters.');
        }

        if (mb_strlen($value) < 60 || preg_match('/^\$2[ayb]\$.{56}$/', $value) !== 1) {
            return new Error('Invalid password hash format.');
        }

        return true;
    }

    public function verify(Password $plain): bool
    {
        return password_verify((string) $plain, $this->value);
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
