<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use InvalidArgumentException;
use Stringable;

final readonly class Slug implements Stringable
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
            return new Error('Slug must be between 3 and 255 characters.');
        }

        if (preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value) !== 1) {
            return new Error('Invalid slug format.');
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
