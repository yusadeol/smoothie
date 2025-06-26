<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use InvalidArgumentException;

final readonly class Uuid implements \Stringable
{
    public function __construct(private string $value) {}

    public static function parse(string $value): self
    {
        if (! self::isValid($value)) {
            throw new InvalidArgumentException('Invalid UUID format.');
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $value
        ) === 1;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
