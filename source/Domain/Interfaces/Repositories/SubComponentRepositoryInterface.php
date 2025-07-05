<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\SubComponent\Interfaces\SubComponentInterface;
use Source\Domain\Vo\Error;
use Source\Domain\Vo\Uuid;

interface SubComponentRepositoryInterface
{
    public function getById(Uuid $id): SubComponentInterface|Error;

    /**
     * @return array<SubComponentInterface>|Error
     */
    public function getAllByParentId(Uuid $id): array|Error;
}
