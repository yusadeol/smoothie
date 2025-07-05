<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\SubComponent\Image;
use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\Interfaces\Repositories\SubComponentRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Uuid;

final readonly class SubComponentRepository implements SubComponentRepositoryInterface
{
    /** @var array<string, array<SubComponentInterface>> */
    private array $subComponents;

    public function __construct()
    {
        $componentId = new Uuid('0197d891-0b0a-70a7-b2b2-a32ff67a5149');

        $this->subComponents = [
            (string) $componentId => [
                new Image(
                    new Uuid('0197d892-696b-7011-83bd-b7d31ea769db'),
                    $componentId
                ),
            ],
        ];
    }

    public function getById(Uuid $id): SubComponentInterface|Error
    {
        foreach ($this->subComponents as $subComponents) {
            foreach ($subComponents as $subComponent) {
                if ($subComponent->id->equals($id)) {
                    return $subComponent;
                }
            }
        }

        return new Error('Subcomponent not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByParentId(Uuid $id): array|Error
    {
        foreach ($this->subComponents as $componentId => $subComponents) {
            if (new Uuid($componentId)->equals($id)) {
                return $subComponents;
            }
        }

        return new Error('No subcomponents found.');
    }
}
