<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use InvalidArgumentException;

final readonly class Slug implements \Stringable
{
    public function __construct(private string $value) {}

    public static function parse(string $value): self
    {
        if (! self::isValid($value)) {
            throw new InvalidArgumentException('Invalid slug format.');
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value) === 1;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
