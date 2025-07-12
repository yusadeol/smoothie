<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use InvalidArgumentException;
use Stringable;

final readonly class FieldType implements Stringable
{
    public string $value;

    /**
     * @param  class-string  $value
     */
    public function __construct(string $value)
    {
        $validation = self::validate($value);
        if ($validation instanceof Error) {
            throw new InvalidArgumentException((string) $validation);
        }

        $this->value = $value;
    }

    public static function isValid(string $value): bool
    {
        return self::validate($value) === true;
    }

    private static function validate(string $value): true|Error
    {
        if (! class_exists($value)) {
            return new Error("Class '{$value}' does not exist.");
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
