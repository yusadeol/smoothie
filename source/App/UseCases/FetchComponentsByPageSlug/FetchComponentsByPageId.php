<?php

declare(strict_types=1);

namespace Source\App\UseCases\FetchComponentsByPageSlug;

use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\ValueObjects\Error;

final readonly class FetchComponentsByPageId
{
    public function __construct(
        private ComponentRepositoryInterface $componentRepository
    ) {}

    public function execute(Input $input): Output|Error
    {
        $components = $this->componentRepository->getAllByPageId($input->pageId);
        if ($components instanceof Error) {
            return $components;
        }

        return new Output($components);
    }
}
