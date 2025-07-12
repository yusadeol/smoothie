<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/public',
        __DIR__.'/database',
        __DIR__.'/routes',
        __DIR__.'/source',
    ])
    ->withRules([
        DeclareStrictTypesRector::class,
    ])
    ->withImportNames()
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
        privatization: true,
        earlyReturn: true,
        strictBooleans: true
    )
    ->withPhpSets();
