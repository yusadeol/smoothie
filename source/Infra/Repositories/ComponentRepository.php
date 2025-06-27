<?php

declare(strict_types=1);

namespace Source\Infra\Repositories;

use Source\Domain\Entities\Component;
use Source\Domain\Enums\ComponentType;
use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\VO\Error;
use Source\Domain\VO\Name;
use Source\Domain\VO\Uuid;

final readonly class ComponentRepository implements ComponentRepositoryInterface
{
    /** @var array<string, array<Component>> */
    private array $components;

    public function __construct()
    {
        $pageId = Uuid::parse('0197af10-5089-713d-a3d3-f3937f625476');

        $this->components = [
            (string) $pageId => [
                new Component(
                    Uuid::parse('0197af14-f7b5-7252-bc1c-6b854dadb0f2'),
                    Name::parse('Lançamentos'),
                    ComponentType::BANNER,
                    $pageId
                ),
            ],
        ];
    }

    public function getById(Uuid $id): Component|Error
    {
        foreach ($this->components as $components) {
            foreach ($components as $component) {
                if ($component->id->equals($id)) {
                    return $component;
                }
            }
        }

        return Error::parse('Component not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByPageId(Uuid $id): array|Error
    {
        foreach ($this->components as $pageId => $components) {
            if (Uuid::parse($pageId)->equals($id)) {
                return $components;
            }
        }

        return Error::parse('No components found.');
    }
}
