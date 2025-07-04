<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use InvalidArgumentException;

final readonly class QuantityRange
{
    public function __construct(
        public int $min,
        public int $max
    ) {}

    public static function parse(int $min, int $max): self
    {
        $isValid = self::validate($min, $max);
        if ($isValid instanceof Error) {
            throw new InvalidArgumentException((string) $isValid);
        }

        return new self($min, $max);
    }

    private static function validate(int $min, int $max): true|Error
    {
        if ($min < 0) {
            return Error::parse('Min quantity must be >= 0.');
        }

        if ($max < 1) {
            return Error::parse('Max quantity must be >= 1.');
        }

        if ($max < $min) {
            return Error::parse('Max quantity must be >= min quantity.');
        }

        return true;
    }

    public function equals(self $other): bool
    {
        return $this->min === $other->min && $this->max === $other->max;
    }
}
