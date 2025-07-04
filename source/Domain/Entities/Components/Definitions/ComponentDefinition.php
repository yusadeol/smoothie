<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Definitions;

use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Vo\Key;
use Source\Domain\Vo\Label;

final readonly class ComponentDefinition
{
    /**
     * @param  array<FieldDefinition>|null  $fields
     * @param  array<SubComponentDefinition>|null  $subComponents
     */
    public function __construct(
        public Key $key,
        public Label $label,
        public ?array $fields = null,
        public ?array $subComponents = null
    ) {}
}
