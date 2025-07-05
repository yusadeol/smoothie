<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\Vo\Email;
use Source\Domain\Vo\Name;
use Source\Domain\Vo\PasswordHashed;
use Source\Domain\Vo\Uuid;

final readonly class User
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public Email $email,
        public PasswordHashed $password,
    ) {}
}
