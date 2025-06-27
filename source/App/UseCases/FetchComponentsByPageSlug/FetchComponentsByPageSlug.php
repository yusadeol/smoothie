<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Entities\Component;
use Source\Domain\Interfaces\Repositories\ComponentChildRepositoryInterface;
use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\VO\Error;
use Source\Domain\VO\Slug;

final readonly class FetchComponentsByPageSlug
{
    public function __construct(
        public PageRepositoryInterface $pageRepository,
        public ComponentRepositoryInterface $componentRepository,
        public ComponentChildRepositoryInterface $componentChildRepository
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

        $componentsArray = array_map(fn (Component $component): array => $component->toArray(), $components);

        return new Output($componentsArray);
    }
}
