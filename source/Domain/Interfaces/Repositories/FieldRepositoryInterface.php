<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\Field;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Uuid;

interface FieldRepositoryInterface
{
    public function getById(Uuid $id): Field|Error;

    /**
     * @return array<Field>|Error
     */
    public function getAllByComponentId(Uuid $id): array|Error;
}
