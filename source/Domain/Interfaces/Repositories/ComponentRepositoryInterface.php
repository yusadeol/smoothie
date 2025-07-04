<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\Vo\Error;
use Source\Domain\Vo\Uuid;

interface ComponentRepositoryInterface
{
    public function getById(Uuid $id): ComponentInterface|Error;

    /**
     * @return array<ComponentInterface>|Error
     */
    public function getAllByPageId(Uuid $id): array|Error;
}
