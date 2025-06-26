<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use InvalidArgumentException;
use Stringable;

final readonly class Password implements Stringable
{
    public function __construct(private string $value) {}

    public static function parse(string $value): self
    {
        if (! self::isValid($value)) {
            throw new InvalidArgumentException('Password must be at least 8 characters long.');
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return strlen($value) >= 8;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
