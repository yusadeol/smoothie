<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Exception;
use Source\Domain\Entities\Component;
use Source\Domain\Entities\ComponentDefinition;
use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\Interfaces\Repositories\FieldRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Uuid;

final readonly class ComponentRepository implements ComponentRepositoryInterface
{
    /** @var array<string, array<Component>> */
    private array $components;

    public function __construct(
        private FieldRepositoryInterface $fieldRepository,
    ) {
        $pageId = new Uuid('0197af10-5089-713d-a3d3-f3937f625476');

        $bannerId = new Uuid('0197efa3-b183-7034-b9b3-c73eba6726fd');
        $imageId = new Uuid('0197efa3-d728-722b-b9d4-114841d1550a');

        $this->components = [
            (string) $pageId => [
                $this->buildBannerComponent($bannerId, $imageId, $pageId),
            ],
        ];
    }

    private function buildBannerComponent(Uuid $bannerId, Uuid $imageId, Uuid $pageId): Component
    {
        /** @var ComponentDefinition $bannerDefinition */
        $bannerDefinition = require basePath('source/Domain/Definitions/Components/Banner.php');

        $imageDefinition = $bannerDefinition->getSubComponentDefinition(new Key('image'));

        $bannerFields = $this->fieldRepository->getAllByComponentId($bannerId);
        if ($bannerFields instanceof Error) {
            throw new Exception((string) $bannerFields);
        }

        $imageFields = $this->fieldRepository->getAllByComponentId($imageId);
        if ($imageFields instanceof Error) {
            throw new Exception((string) $imageFields);
        }

        return new Component(
            $bannerId,
            $pageId,
            $bannerDefinition,
            $bannerFields,
            [
                new Component(
                    $imageId,
                    $pageId,
                    $imageDefinition,
                    $imageFields,
                    [],
                    $bannerId
                ),
            ]
        );
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

        return new Error('Component not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByPageId(Uuid $id): array|Error
    {
        foreach ($this->components as $pageId => $components) {
            if (new Uuid($pageId)->equals($id)) {
                return $components;
            }
        }

        return new Error('No components found.');
    }
}
