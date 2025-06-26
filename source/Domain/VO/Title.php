<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use Source\Domain\VO\Traits\Validatable;
use Stringable;

final readonly class Title implements Stringable
{
    use Validatable;

    public function __construct(private string $value) {}

    private static function validate(string $value): true|Error
    {
        $length = mb_strlen($value);
        if ($length < 4 || $length > 255) {
            return Error::parse('Title must be between 4 and 255 characters.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
