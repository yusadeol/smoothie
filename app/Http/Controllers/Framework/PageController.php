<?php

declare(strict_types=1);

namespace App\Http\Controllers\Framework;

use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageSlug;
use Source\App\UseCases\FetchComponentsByPageSlug\Input;
use Source\Domain\Interfaces\Repositories\ComponentChildRepositoryInterface;
use Source\Domain\Interfaces\Repositories\ComponentRepositoryInterface;
use Source\Domain\Interfaces\Repositories\PageRepositoryInterface;
use Source\Domain\VO\Error;

final readonly class PageController extends Controller
{
    public function __construct(
        Router $router,
        private PageRepositoryInterface $pageRepository,
        private ComponentRepositoryInterface $componentRepository,
        private ComponentChildRepositoryInterface $componentChildRepository
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

        $fetchComponentsByPageSlug = new FetchComponentsByPageSlug(
            $this->pageRepository,
            $this->componentRepository,
            $this->componentChildRepository
        );

        $output = $fetchComponentsByPageSlug->execute(
            new Input(
                $slug
            )
        );

        if ($output instanceof Error) {
            $this->router->redirect('badRequest');

            return;
        }

        $this->smarty->assign('components', $output->components);
        $this->smarty->display('framework/page.tpl');
    }
}
