<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Vo\Error;
use Source\Domain\Vo\Uuid;

interface FieldRepositoryInterface
{
    public function getById(Uuid $id): FieldInterface|Error;

    /**
     * @return array<FieldInterface>|Error
     */
    public function getAllByOwnerId(Uuid $id): array|Error;
}
