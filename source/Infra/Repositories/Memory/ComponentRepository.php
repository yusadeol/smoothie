<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\Components\Banner;
use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\Vo\Error;
use Source\Domain\Vo\Uuid;

final readonly class ComponentRepository implements ComponentRepositoryInterface
{
    /** @var array<string, array<ComponentInterface>> */
    private array $components;

    public function __construct()
    {
        $pageId = Uuid::parse('0197af10-5089-713d-a3d3-f3937f625476');

        $this->components = [
            (string) $pageId => [
                new Banner(
                    Uuid::parse('0197d891-0b0a-70a7-b2b2-a32ff67a5149'),
                    $pageId,
                ),
            ],
        ];
    }

    public function getById(Uuid $id): ComponentInterface|Error
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
