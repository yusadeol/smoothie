<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageId;
use Source\App\UseCases\FetchComponentsByPageSlug\Input as FetchComponentsByPageSlugInput;
use Source\App\UseCases\FetchPageBySlug\FetchPageBySlug;
use Source\App\UseCases\FetchPageBySlug\Input as FetchPageBySlugInput;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Slug;

final readonly class PageController extends Controller
{
    public function __construct(
        Router $router,
        private FetchPageBySlug $fetchPageBySlug,
        private FetchComponentsByPageId $fetchComponentsByPageSlug
    ) {
        parent::__construct($router);
    }

    /**
     * @param  array<string, string>  $data
     */
    public function __invoke(array $data): void
    {
        $slug = $data['slug'] ?? null;
        if (! is_string($slug) || ($slug === '' || $slug === '0')) {
            $this->router->redirect('notFound');

            return;
        }

        if (! Slug::isValid($slug)) {
            $this->router->redirect('badRequest');

            return;
        }

        $fetchPageBySlugOutput = $this->fetchPageBySlug->execute(
            new FetchPageBySlugInput(
                new Slug($slug)
            )
        );

        if ($fetchPageBySlugOutput instanceof Error) {
            $this->router->redirect('badRequest');

            return;
        }

        $page = $fetchPageBySlugOutput->page;

        $fetchComponentsByPageSlugOutput = $this->fetchComponentsByPageSlug->execute(
            new FetchComponentsByPageSlugInput(
                $page->id
            )
        );

        if ($fetchComponentsByPageSlugOutput instanceof Error) {
            $this->router->redirect('badRequest');

            return;
        }

        $this->smarty->assign('page', $page);
        $this->smarty->assign('components', $fetchComponentsByPageSlugOutput->components);
        $this->smarty->display('page.tpl');
    }
}
