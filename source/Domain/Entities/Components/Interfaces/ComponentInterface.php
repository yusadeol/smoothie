<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components\Interfaces;

use Source\Domain\Entities\Components\Definitions\ComponentDefinition;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Vo\Uuid;

interface ComponentInterface
{
    /**
     * @param  array<FieldInterface>  $fields
     * @param  array<ComponentInterface>|null  $subComponents
     */
    public function __construct(
        Uuid $id,
        Uuid $pageId,
        ?Uuid $parentId,
        ?array $fields = null,
        ?array $subComponents = null
    );

    public static function getDefinition(): ComponentDefinition;
}
