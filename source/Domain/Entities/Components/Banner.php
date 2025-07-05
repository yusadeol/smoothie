<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Components;

use Source\Domain\Entities\Components\Definitions\ComponentDefinition;
use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Entities\Fields\Title;
use Source\Domain\Entities\Fields\Url;
use Source\Domain\Entities\SubComponent\Image;
use Source\Domain\Vo\Key;
use Source\Domain\Vo\Label;
use Source\Domain\Vo\QuantityRange;
use Source\Domain\Vo\Uuid;

final readonly class Banner implements ComponentInterface
{
    /**
     * {@inheritDoc}
     */
    public function __construct(
        public Uuid $id,
        public Uuid $pageId,
        public ?Uuid $parentId,
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
