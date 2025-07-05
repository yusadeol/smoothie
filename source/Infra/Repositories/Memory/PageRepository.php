<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\Page;
use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Slug;
use Source\Domain\ValueObjects\Title;
use Source\Domain\ValueObjects\Uuid;

final readonly class PageRepository implements PageRepositoryInterface
{
    /** @var array<string, array<Page>> */
    private array $pages;

    public function __construct()
    {
        $userId = new Uuid('0197af11-2043-7259-88d6-04da13901d1b');

        $this->pages = [
            (string) $userId => [
                new Page(
                    new Uuid('0197af10-5089-713d-a3d3-f3937f625476'),
                    new Title('Página Inicial'),
                    new Slug('pagina-inicial'),
                    $userId
                ),
            ],
        ];
    }

    public function getById(Uuid $id): Page|Error
    {
        foreach ($this->pages as $pages) {
            foreach ($pages as $page) {
                if ($page->id->equals($id)) {
                    return $page;
                }
            }
        }

        return new Error('Page not found for the given ID.');
    }

    public function getBySlug(Slug $slug): Page|Error
    {
        foreach ($this->pages as $pages) {
            foreach ($pages as $page) {
                if ($page->slug->equals($slug)) {
                    return $page;
                }
            }
        }

        return new Error('Page not found for the given slug.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByUserId(Uuid $id): array|Error
    {
        foreach ($this->pages as $userId => $pages) {
            if (new Uuid($userId)->equals($id)) {
                return $pages;
            }
        }

        return new Error('No pages found.');
    }
}
