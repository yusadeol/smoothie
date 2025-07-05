<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent\Interfaces;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\SubComponent\Definitions\SubComponentDefinition;
use Source\Domain\Vo\Uuid;

interface SubComponentInterface
{
    /**
     * @param  array<FieldInterface>  $fields
     * @param  array<ComponentInterface>|null  $subComponents
     */
    public function __construct(
        Uuid $id,
        ?Uuid $parentId,
        ?array $fields = null,
        ?array $subComponents = null
    );

    public static function getDefinition(): SubComponentDefinition;
}
