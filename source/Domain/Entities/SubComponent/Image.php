<?php

declare(strict_types=1);

namespace Source\Domain\Entities\SubComponent;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\Fields\Title;
use Source\Domain\Entities\Fields\Url;
use Source\Domain\Entities\SubComponent\Definitions\SubComponentDefinition;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\Entities\SubComponent\Traits\HasFields;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\Uuid;

final class Image implements SubComponentInterface
{
    use HasFields;

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
            new Key('image'),
            new Label('Imagem'),
            self::class,
            [
                Title::getDefinition(),
                Url::getDefinition(),
            ],
        );
    }
}
