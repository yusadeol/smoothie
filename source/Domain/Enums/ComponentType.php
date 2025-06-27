<?php

declare(strict_types=1);

namespace Source\Domain\Enums;

enum ComponentType: string
{
    case GALLERY = 'gallery';
    case BANNER = 'banner';
    case CARD = 'card';
    case LIST = 'list';

    public function label(): string
    {
        return match ($this) {
            self::GALLERY => 'Galeria',
            self::BANNER => 'Banner',
            self::CARD => 'Cartão',
            self::LIST => 'Lista',
        };
    }

    public function toString(): string
    {
        return $this->value;
    }
}
