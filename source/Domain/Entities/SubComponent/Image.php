<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\Fields\Title;
use Source\Domain\Entities\Fields\Url;
use Source\Domain\Entities\SubComponent\Definitions\SubComponentDefinition;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\Vo\Key;
use Source\Domain\Vo\Label;
use Source\Domain\Vo\Uuid;

final class Image implements SubComponentInterface
{
    /**
     * @param  array<FieldInterface>  $fields
     * @param  array<SubComponentInterface>|null  $subComponents
     */
    public function __construct(
        public Uuid $id,
        public Uuid $parentId,
        public ?array $fields = null,
        public ?array $subComponents = null
    ) {}

    public static function getDefinition(): SubComponentDefinition
    {
        return new SubComponentDefinition(
            Key::parse('image'),
            Label::parse('Imagem'),
            self::class,
            [
                Title::getDefinition(),
                Url::getDefinition(),
            ],
        );
    }
}
