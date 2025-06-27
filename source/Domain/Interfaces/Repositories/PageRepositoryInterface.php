<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Page;
use Source\Domain\VO\Error;
use Source\Domain\VO\Slug;
use Source\Domain\VO\Uuid;

interface PageRepositoryInterface
{
    public function getById(Uuid $id): Page|Error;

    public function getBySlug(Slug $slug): Page|Error;

    /**
     * @return array<Page>|Error
     */
    public function getAllByUserId(Uuid $id): array|Error;
}
