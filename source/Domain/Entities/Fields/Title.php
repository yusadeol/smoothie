<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields;

use InvalidArgumentException;
use Source\Domain\Entities\Fields\Definitions\FieldDefinition;
use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Label;
use Source\Domain\ValueObjects\Title as TitleVo;
use Source\Domain\ValueObjects\Uuid;

final class Title implements FieldInterface
{
    public function __construct(
        public Uuid $id,
        public Uuid $ownerId,
        public mixed $value {
            get {
                return $this->value;
            }
            set {
                if (! $value instanceof TitleVo) {
                    $titleVoClass = TitleVo::class;
                    throw new InvalidArgumentException("Value must be of type {$titleVoClass}.");
                }
                $this->value = $value;
            }
        }
    ) {}

    public static function getDefinition(): FieldDefinition
    {
        return new FieldDefinition(
            new Key('title'),
            new Label('Título'),
            self::class
        );
    }
}
