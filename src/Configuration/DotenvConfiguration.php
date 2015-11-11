<?php

namespace Spark\Configuration;

use Auryn\Injector;
use josegonzalez\Dotenv\Loader;

class DotenvConfiguation implements ConfigurationInterface
{
    public function apply(Injector $injector)
    {
        $injector->prepare(Loader::class, [$this, 'prepareLoader']);
        $injector->delegate(Settings::class, [$this, 'getSettings']);
    }

    public function prepareLoader(Loader $loader, Injector $injector)
    {
        $loader->parse();
        $injector->share($loader);
    }

    public function getSettings(Loader $loader)
    {
        return new Settings($loader->toArray());
    }
}
