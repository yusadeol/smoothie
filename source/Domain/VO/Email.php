<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use InvalidArgumentException;
use Stringable;

final readonly class Email implements Stringable
{
    public function __construct(private string $value) {}

    public static function parse(string $value): self
    {
        if (! self::isValid($value)) {
            throw new InvalidArgumentException('Invalid email format.');
        }

        return new self($value);
    }

    public static function isValid(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
