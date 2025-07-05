<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent\Interfaces;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\SubComponent\Definitions\SubComponentDefinition;
use Source\Domain\Vo\Uuid;

interface SubComponentInterface
{
    public Uuid $id { get; set; }

    public Uuid $parentId { get; set; }

    /** @var array<FieldInterface>|null */
    public ?array $fields { get; set; }

    /** @var array<SubComponentInterface>|null */
    public ?array $subComponents { get; set; }

    /**
     * @param class-string<FieldInterface> $fieldClass
     */
    public function getField(string $fieldClass): ?FieldInterface;

    public static function getDefinition(): SubComponentDefinition;
}
