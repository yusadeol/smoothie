<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\ComponentChild;
use Source\Domain\VO\Error;
use Source\Domain\VO\Uuid;

interface ComponentChildRepositoryInterface
{
    public function getById(Uuid $id): ComponentChild|Error;

    /**
     * @return array<ComponentChild>|Error
     */
    public function getAllByComponentId(Uuid $id): array|Error;
}
