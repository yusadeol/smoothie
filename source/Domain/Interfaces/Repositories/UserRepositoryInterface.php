<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\User;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Uuid;

interface UserRepositoryInterface
{
    public function getById(Uuid $id): User|Error;
}
