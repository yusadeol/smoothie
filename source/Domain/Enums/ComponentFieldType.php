<?php

declare(strict_types=1);

namespace Source\Domain\Enums;

enum ComponentFieldType: string
{
    case TEXT = 'text';
    case TEXTAREA = 'textarea';
    case IMAGE = 'image';
    case COLOR = 'color';
    case LINK = 'link';
    case NUMBER = 'number';

    public function label(): string
    {
        return match ($this) {
            self::TEXT => 'Texto',
            self::TEXTAREA => 'Área de Texto',
            self::IMAGE => 'Imagem',
            self::COLOR => 'Cor',
            self::LINK => 'Link',
            self::NUMBER => 'Número',
        };
    }
}
