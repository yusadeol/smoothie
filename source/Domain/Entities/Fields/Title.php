<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields;

use InvalidArgumentException;
use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Vo\Title as TitleVo;
use Source\Domain\Vo\Uuid;

final class Title implements FieldInterface
{
    public function __construct(
        public readonly Uuid $id,
        public readonly Uuid $componentId,
        public readonly FieldDefinition $definition,
        public mixed $value {
            set
    {
        if (! $value instanceof TitleVo) {
            $titleVoClass = TitleVo::class;
            throw new InvalidArgumentException("Value must be of type {$titleVoClass}.");
        }
        $this->value = $value;
    }
        }
    ) {}
}
