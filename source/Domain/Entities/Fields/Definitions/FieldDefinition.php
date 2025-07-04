<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields\Definitions;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Vo\Key;
use Source\Domain\Vo\Label;

final readonly class FieldDefinition
{
    /**
     * @param  class-string<FieldInterface>  $field
     */
    public function __construct(
        public Key $key,
        public Label $label,
        public string $field
    ) {}
}
