<?php

declare(strict_types=1);

namespace Source\Domain\ValueObjects;

use InvalidArgumentException;

final readonly class QuantityRange
{
    public int $min;

    public int $max;

    public function __construct(
        int $min,
        int $max
    ) {
        $isValid = self::validate($min, $max);
        if ($isValid instanceof Error) {
            throw new InvalidArgumentException((string) $isValid);
        }

        $this->min = $min;
        $this->max = $max;
    }

    public static function isValid(int $min, int $max): bool
    {
        return self::validate($min, $max) === true;
    }

    private static function validate(int $min, int $max): true|Error
    {
        if ($min < 0) {
            return new Error('Min quantity must be >= 0.');
        }

        if ($max < 1) {
            return new Error('Max quantity must be >= 1.');
        }

        if ($max < $min) {
            return new Error('Max quantity must be >= min quantity.');
        }

        return true;
    }

    public function equals(self $other): bool
    {
        return $this->min === $other->min && $this->max === $other->max;
    }
}
