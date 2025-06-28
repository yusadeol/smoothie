<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\Vo\Error;
use Source\Domain\Vo\Slug;

final readonly class FetchComponentsByPageSlug
{
    public function __construct(
        private PageRepositoryInterface $pageRepository,
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

        return new Output;
    }
}
