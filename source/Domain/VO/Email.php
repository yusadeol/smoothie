<?php

declare(strict_types=1);

namespace Source\Domain\VO;

use Source\Domain\VO\Traits\Validatable;
use Stringable;

final readonly class Email implements Stringable
{
    use Validatable;

    public function __construct(private string $value) {}

    private static function validate(string $value): true|Error
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return Error::parse('Invalid email format.');
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
