<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields\Definitions;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;

final readonly class FieldDefinition
{
    /**
     * @param  class-string<FieldInterface>  $fieldClass
     */
    public function __construct(
        public Key $key,
        public Label $label,
        public string $fieldClass
    ) {}
}
