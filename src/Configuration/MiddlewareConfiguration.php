<?php

namespace Spark\Configuration;

use Auryn\Injector;

class MiddlewareConfiguration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function apply(Injector $injector)
    {
        $injector->alias(
            'Spark\Middleware\Collection',
            'Spark\Middleware\DefaultCollection'
        );
    }
}
