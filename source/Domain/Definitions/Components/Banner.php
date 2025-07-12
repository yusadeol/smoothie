<?php

declare(strict_types=1);

namespace Source\Domain\Definitions\Components;

use Source\Domain\Entities\ComponentDefinition;
use Source\Domain\Entities\FieldDefinition;
use Source\Domain\Entities\SubComponentDefinition;
use Source\Domain\ValueObjects\FieldType;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\QuantityRange;
use Source\Domain\ValueObjects\Title;
use Source\Domain\ValueObjects\Url;

return new ComponentDefinition(
    new Key('banner'),
    new Label('Banner'),
    fieldDefinitions: [
        new FieldDefinition(
            new Key('title'),
            new Label('Título'),
            new FieldType(Title::class)
        ),
        new FieldDefinition(
            new Key('link'),
            new Label('Link'),
            new FieldType(Url::class)
        ),
    ],
    subComponentDefinitions: [
        new SubComponentDefinition(
            new ComponentDefinition(
                new Key('image'),
                new Label('Imagem'),
                fieldDefinitions: [
                    new FieldDefinition(
                        new Key('url'),
                        new Label('URL'),
                        new FieldType(Url::class)
                    ),
                    new FieldDefinition(
                        new Key('alt'),
                        new Label('Descrição'),
                        new FieldType(Title::class)
                    ),
                ]
            ),
            new QuantityRange(1, 1)
        ),
    ]
);
