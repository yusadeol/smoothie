<?php

declare(strict_types=1);

namespace Source\Domain\Enums;

use Source\Domain\Vo\Error;

enum Size: string
{
    case SMALL = 'small';
    case MEDIUM = 'medium';
    case LARGE = 'large';

    public function getLabel(): string
    {
        return match ($this) {
            self::SMALL => 'Small',
            self::MEDIUM => 'Medium',
            self::LARGE => 'Large',
        };
    }

    public static function fromValue(string $value): self|Error
    {
        return match ($value) {
            'small' => self::SMALL,
            'medium' => self::MEDIUM,
            'large' => self::LARGE,
            default => Error::parse("Invalid size value: {$value}.")
        };
    }
}
