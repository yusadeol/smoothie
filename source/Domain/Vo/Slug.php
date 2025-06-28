<?php

declare(strict_types=1);

namespace Source\Domain\Vo;

use Source\Domain\Vo\Traits\ValidatableString;
use Stringable;

final readonly class Slug implements Stringable
{
    use ValidatableString;

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Slug must be between 4 and 255 characters.');
        }

        if (preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value) !== 1) {
            return Error::parse('Invalid slug format.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
