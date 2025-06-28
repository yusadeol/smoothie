<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use InvalidArgumentException;
use Stringable;

final readonly class Error implements Stringable
{
    public function __construct(public string $value) {}

    public static function parse(string $value): self
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            throw new InvalidArgumentException('Error must be between 4 and 255 characters.');
        }

        return new self($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
