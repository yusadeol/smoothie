<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use CoffeeCode\Router\Router;
use Source\App\UseCases\FetchComponentsByPageSlug\FetchComponentsByPageSlug;
use Source\App\UseCases\FetchComponentsByPageSlug\Input;
use Source\Domain\ValueObjects\Error;

final readonly class PageController extends Controller
{
    public function __construct(
        Router $router,
        private FetchComponentsByPageSlug $fetchComponentsByPageSlug
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

        $output = $this->fetchComponentsByPageSlug->execute(
            new Input(
                $slug
            )
        );

        if ($output instanceof Error) {
            $this->router->redirect('badRequest');

            return;
        }

        $this->smarty->assign('page', $output->page);
        $this->smarty->display('page.tpl');
    }
}
