<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent\Definitions;

use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\QuantityRange;

final class SubComponentDefinition
{
    public QuantityRange $quantityRange;

    /**
     * @param  class-string<SubComponentInterface>  $subComponentClass
     * @param  array<FieldDefinition>|null  $fieldDefinitions
     * @param  array<SubComponentDefinition>|null  $subComponentDefinitions
     */
    public function __construct(
        public readonly Key $key,
        public readonly Label $label,
        public readonly string $subComponentClass,
        public readonly ?array $fieldDefinitions = null,
        public readonly ?array $subComponentDefinitions = null,
    ) {
        $this->quantityRange = new QuantityRange(1, 10);
    }
}
