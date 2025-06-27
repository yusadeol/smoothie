<?php

declare(strict_types=1);

namespace Source\Domain\Enums;

enum ComponentChildType: string
{
    case IMAGE = 'image';
    case ICON = 'icon';

    public function label(): string
    {
        return match ($this) {
            self::IMAGE => 'Imagem',
            self::ICON => 'Ícone',
        };
    }
}
