<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\VO\Email;
use Source\Domain\VO\Name;
use Source\Domain\VO\PasswordHashed;
use Source\Domain\VO\Uuid;

class User
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public Email $email,
        public PasswordHashed $password,
    ) {}
}
