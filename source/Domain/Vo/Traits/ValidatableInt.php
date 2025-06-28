<?php

declare(strict_types=1);

namespace Source\Domain\Vo\Traits;

use InvalidArgumentException;
use Source\Domain\Vo\Error;

trait ValidatableInt
{
    public function __construct(public int $value) {}

    public static function parse(int $value): self
    {
        $isValid = self::validate($value);
        if ($isValid instanceof Error) {
            throw new InvalidArgumentException((string) $isValid);
        }

        return new self($value);
    }

    public static function isValid(int $value): bool
    {
        return self::validate($value) === true;
    }

    abstract private static function validate(int $value): true|Error;

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
