<?php

declare(strict_types=1);

namespace Source\Domain\Entities\Fields;

use Source\Domain\Vo\Url as UrlVo;

final readonly class Url
{
    public function __construct(public UrlVo $url) {}
}
