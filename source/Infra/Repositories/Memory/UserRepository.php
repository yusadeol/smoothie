<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\User;
use Source\Domain\Interfaces\Repositories\UserRepositoryInterface;
use Source\Domain\ValueObjects\Email;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Name;
use Source\Domain\ValueObjects\Password;
use Source\Domain\ValueObjects\Uuid;

final readonly class UserRepository implements UserRepositoryInterface
{
    /** @var array<User> */
    private array $users;

    public function __construct()
    {
        $this->users = [
            new User(
                Uuid::parse('0197af11-2043-7259-88d6-04da13901d1b'),
                Name::parse('Yuri Oliveira'),
                Email::parse('yuri.oliveira@ysocode.com'),
                Password::parse('senha123')->hash()
            ),
        ];
    }

    public function getById(Uuid $id): User|Error
    {
        foreach ($this->users as $user) {
            if ($user->id === $id) {
                return $user;
            }
        }

        return Error::parse('User not found for the given ID.');
    }
}
