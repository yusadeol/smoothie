<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Page;
use Source\Domain\VO\Error;
use Source\Domain\VO\Uuid;

interface PageRepositoryInterface
{
    /**
     * @return array<Page>|Error
     */
    public function getAll(): array|Error;

    public function getById(Uuid $id): Page|Error;
}
