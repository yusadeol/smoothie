<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\Interfaces\Repositories\FieldRepositoryInterface;
use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\Interfaces\Repositories\SubComponentRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Slug;

final readonly class FetchComponentsByPageSlug
{
    public function __construct(
        private PageRepositoryInterface $pageRepository,
        private ComponentRepositoryInterface $componentRepository,
        private SubComponentRepositoryInterface $subComponentRepository,
        private FieldRepositoryInterface $fieldRepository
    ) {}

    public function execute(Input $input): Output|Error
    {
        if (! Slug::isValid($input->pageSlug)) {
            return Error::parse('Page not found.');
        }

        $page = $this->pageRepository->getBySlug(Slug::parse($input->pageSlug));
        if ($page instanceof Error) {
            return $page;
        }

        $components = $this->componentRepository->getAllByPageId($page->id);
        if ($components instanceof Error) {
            return $components;
        }

        foreach ($components as $component) {
            $fields = $this->fieldRepository->getAllByOwnerId($component->id);
            if ($fields instanceof Error) {
                return $fields;
            }

            $component->fields = $fields;

            $subComponents = $this->subComponentRepository->getAllByParentId($component->id);
            if ($subComponents instanceof Error) {
                return $subComponents;
            }

            foreach ($subComponents as $subComponent) {
                $fields = $this->fieldRepository->getAllByOwnerId($subComponent->id);
                if ($fields instanceof Error) {
                    return $fields;
                }

                $subComponent->fields = $fields;
            }

            $component->subComponents = $subComponents;
        }

        $page->components = $components;

        return new Output($page);
    }
}
