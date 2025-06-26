<?php

declare(strict_types=1);

namespace Source\Infra\Repositories;

use Source\Domain\Entities\Page;
use Source\Domain\Entities\User;
use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\VO\Email;
use Source\Domain\VO\Error;
use Source\Domain\VO\Name;
use Source\Domain\VO\Password;
use Source\Domain\VO\Slug;
use Source\Domain\VO\Title;
use Source\Domain\VO\Uuid;
use Source\Infra\Factories\UuidGeneratorFactory;

final readonly class PageRepository implements PageRepositoryInterface
{
    /** @var array<Page> */
    private array $pages;

    public function __construct()
    {
        $uuidGenerator = UuidGeneratorFactory::create();

        $user = new User(
            Uuid::parse($uuidGenerator->generate()),
            Name::parse('Yuri Oliveira'),
            Email::parse('yuri.oliveira@ysocode.com'),
            Password::parse('senha123')->hash()
        );

        $this->pages = [
            new Page(
                Uuid::parse($uuidGenerator->generate()),
                Title::parse('Página Inicial'),
                Slug::parse('pagina-inicial'),
                $user
            ),
            new Page(
                Uuid::parse($uuidGenerator->generate()),
                Title::parse('Sobre Nós'),
                Slug::parse('sobre-nos'),
                $user
            ),
            new Page(
                Uuid::parse($uuidGenerator->generate()),
                Title::parse('Serviços'),
                Slug::parse('servicos'),
                $user
            ),
            new Page(
                Uuid::parse($uuidGenerator->generate()),
                Title::parse('Contato'),
                Slug::parse('contato'),
                $user
            ),
            new Page(
                Uuid::parse($uuidGenerator->generate()),
                Title::parse('Política de Privacidade'),
                Slug::parse('politica-de-privacidade'),
                $user
            ),
        ];
    }

    /**
     * @return array<Page>|Error
     */
    public function getAll(): array|Error
    {
        return $this->pages ?? Error::parse('No pages found.');
    }

    public function getById(Uuid $id): Page|Error
    {
        foreach ($this->pages as $page) {
            if ($page->id === $id) {
                return $page;
            }
        }

        return Error::parse('Page not found for the given ID.');
    }
}
