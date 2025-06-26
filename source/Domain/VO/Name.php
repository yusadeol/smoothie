<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use InvalidArgumentException;
use Stringable;

final readonly class Name implements Stringable
{
    public function __construct(private string $value) {}

    public static function parse(string $value): self
    {
        if (! self::isValid($value)) {
            throw new InvalidArgumentException('Name must have at least 2 characters.');
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return strlen($value) >= 2;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
