<?php

declare(strict_types=1);

namespace Source\Domain\Entities;

use Source\Domain\ValueObjects\Email;
use Source\Domain\ValueObjects\Name;
use Source\Domain\ValueObjects\PasswordHashed;
use Source\Domain\ValueObjects\Uuid;

final readonly class User
{
    public function __construct(
        public Uuid $id,
        public Name $name,
        public Email $email,
        public PasswordHashed $password,
    ) {}
}
