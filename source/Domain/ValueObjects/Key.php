<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use InvalidArgumentException;
use Stringable;

final readonly class Key implements Stringable
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
        if ($length < 3 || $length > 255) {
            return new Error('Key must be between 3 and 255 characters.');
        }

        $pattern = '/^[a-z][a-z0-9_]*$/';
        if (in_array(preg_match($pattern, $value), [0, false], true)) {
            return new Error('Key must contain only lowercase letters, numbers and underscores.');
        }

        return true;
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
