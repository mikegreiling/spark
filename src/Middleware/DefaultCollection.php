<?php

namespace Spark\Middleware;

use Relay\Middleware\ResponseSender;
use Spark\Handler\ActionHandler;
use Spark\Handler\DispatchHandler;
use Spark\Handler\ExceptionHandler;
use Spark\Handler\FormContentHandler;
use Spark\Handler\JsonContentHandler;

class DefaultCollection extends Collection
{
    public function __construct(array $middleware = [])
    {
        parent::__construct(array_merge([
            ResponseSender::class,
            ExceptionHandler::class,
            JsonContentHandler::class,
            FormContentHandler::class,
            DispatchHandler::class,
            ActionHandler::class,
        ], $middleware));
    }
}
