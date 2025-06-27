<?php

declare(strict_types=1);

namespace Source\Infra\Repositories;

use Source\Domain\Entities\ComponentChild;
use Source\Domain\Enums\ComponentChildType;
use Source\Domain\Interfaces\Repositories\ComponentChildRepositoryInterface;
use Source\Domain\VO\Error;
use Source\Domain\VO\Name;
use Source\Domain\VO\Uuid;

final readonly class ComponentChildRepository implements ComponentChildRepositoryInterface
{
    private array $componentChildren;

    public function __construct()
    {
        $componentId = Uuid::parse('0197af14-f7b5-7252-bc1c-6b854dadb0f2');
        $componentChildId = Uuid::parse('0197af1f-9988-71fc-afc6-2113a23805e2');

        $this->componentChildren = [
            (string) $componentId => [
                new ComponentChild(
                    $componentChildId,
                    Name::parse('Ícone'),
                    ComponentChildType::ICON,
                    $componentId
                ),
            ],
            (string) $componentChildId => [
                new ComponentChild(
                    Uuid::parse('0197af3a-2f72-736b-be37-6e3512d458b9'),
                    Name::parse('Imagem'),
                    ComponentChildType::IMAGE,
                    $componentChildId
                ),
            ],
        ];
    }

    public function getById(Uuid $id): ComponentChild|Error
    {
        foreach ($this->componentChildren as $componentChildren) {
            foreach ($componentChildren as $componentChild) {
                if ($componentChild->id->equals($id)) {
                    return $componentChild;
                }
            }
        }

        return Error::parse('Component child not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByComponentId(Uuid $id): array|Error
    {
        foreach ($this->componentChildren as $componentId => $componentChildren) {
            if (Uuid::parse($componentId)->equals($id)) {
                return $componentChildren;
            }
        }

        return Error::parse('No component children found.');
    }
}
