<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchPageBySlug;

use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\ValueObjects\Error;

final readonly class FetchPageBySlug
{
    public function __construct(
        private PageRepositoryInterface $pageRepository
    ) {}

    public function execute(Input $input): Output|Error
    {
        $page = $this->pageRepository->getBySlug($input->pageSlug);
        if ($page instanceof Error) {
            return $page;
        }

        return new Output($page);
    }
}
