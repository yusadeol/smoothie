<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Interfaces;

use Source\Domain\Entities\Components\Definitions\ComponentDefinition;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\ValueObjects\Uuid;

interface ComponentInterface
{
    public Uuid $id { get; set; }

    public Uuid $pageId { get; set; }

    /** @var array<FieldInterface>|null */
    public ?array $fields { get; set; }

    /** @var array<SubComponentInterface>|null */
    public ?array $subComponents { get; set; }

    /**
     * @param class-string<FieldInterface> $fieldClass
     */
    public function getField(string $fieldClass): ?FieldInterface;

    /**
     * @param class-string<FieldInterface> $fieldClass
     */
    public function getFieldValue(string $fieldClass): mixed;

    public static function getDefinition(): ComponentDefinition;
}
