<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Components\Interfaces\ComponentInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Uuid;

interface ComponentRepositoryInterface
{
    public function getById(Uuid $id): ComponentInterface|Error;

    /**
     * @return array<ComponentInterface>|Error
     */
    public function getAllByPageId(Uuid $id): array|Error;
}
