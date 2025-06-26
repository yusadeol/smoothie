<?php

declare(strict_types=1);

namespace Source\Domain\VO\Traits;

use InvalidArgumentException;
use Source\Domain\VO\Error;

trait Validatable
{
    public static function parse(string $value): self
    {
        $isValid = self::validate($value);
        if ($isValid instanceof Error) {
            throw new InvalidArgumentException((string) $isValid);
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return self::validate($value) === true;
    }

    abstract private static function validate(string $value): true|Error;
}
