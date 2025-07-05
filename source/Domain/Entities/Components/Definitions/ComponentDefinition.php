<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Definitions;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Entities\SubComponent\Definitions\SubComponentDefinition;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;

final readonly class ComponentDefinition
{
    /**
     * @param  class-string<ComponentInterface>  $componentClass
     * @param  array<FieldDefinition>|null  $fieldDefinitions
     * @param  array<SubComponentDefinition>|null  $subComponentDefinitions
     */
    public function __construct(
        public Key $key,
        public Label $label,
        public string $componentClass,
        public ?array $fieldDefinitions = null,
        public ?array $subComponentDefinitions = null
    ) {}
}
