<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components;

use Source\Domain\Entities\Components\Definitions\ComponentDefinition;
use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Components\Traits\HasFields;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\Fields\Title;
use Source\Domain\Entities\Fields\Url;
use Source\Domain\Entities\SubComponent\Image;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\QuantityRange;
use Source\Domain\ValueObjects\Uuid;

final class Banner implements ComponentInterface
{
    use HasFields;

    /**
     * @param  array<FieldInterface>  $fields
     * @param  array<SubComponentInterface>|null  $subComponents
     */
    public function __construct(
        public Uuid $id,
        public Uuid $pageId,
        public ?array $fields = null,
        public ?array $subComponents = null
    ) {}

    public static function getDefinition(): ComponentDefinition
    {
        $imageDefinition = Image::getDefinition();
        $imageDefinition->quantityRange = QuantityRange::parse(1, 1);

        return new ComponentDefinition(
            Key::parse('banner'),
            Label::parse('Banner'),
            self::class,
            [
                Title::getDefinition(),
                Url::getDefinition(),
            ],
            [
                $imageDefinition,
            ]
        );
    }
}
