<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Component;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Uuid;

interface ComponentRepositoryInterface
{
    public function getById(Uuid $id): Component|Error;

    /**
     * @return array<Component>|Error
     */
    public function getAllByPageId(Uuid $id): array|Error;
}
