<?php

declare(strict_types=1);

namespace Source\Domain\Interfaces\Repositories;

use Source\Domain\Entities\User;
use Source\Domain\VO\Error;
use Source\Domain\VO\Uuid;

interface UserRepositoryInterface
{
    public function getById(Uuid $id): User|Error;
}
