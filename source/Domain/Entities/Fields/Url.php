<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields;

use InvalidArgumentException;
use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\Url as UrlVo;
use Source\Domain\ValueObjects\Uuid;

final class Url implements FieldInterface
{
    public function __construct(
        public readonly Uuid $id,
        public readonly Uuid $ownerId,
        public mixed $value {
            set {
                if (! $value instanceof UrlVo) {
                    $urlVoClass = UrlVo::class;
                    throw new InvalidArgumentException("Value must be of type {$urlVoClass}.");
                }
                $this->value = $value;
            }
        }
    ) {}

    public static function getDefinition(): FieldDefinition
    {
        return new FieldDefinition(
            Key::parse('link'),
            Label::parse('Link'),
            self::class
        );
    }
}
