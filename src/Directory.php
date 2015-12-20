<?php

namespace Spark;

use Spark\Action;
use Destrukt\Dictionary;
use Spark\Exception\DirectoryException;

class Directory extends Dictionary
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const HEAD = 'HEAD';
    const DELETE = 'DELETE';
    const OPTIONS = 'OPTIONS';

    /**
     * @inheritDoc
     *
     * @throws DirectoryException If a value is not an Action instance
     */
    public function validate(array $data)
    {
        parent::validate($data);

        foreach ($data as $value) {
            if (!is_object($value) || !$value instanceof Action) {
                throw DirectoryException::invalidEntry($value);
            }
        }
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function get($path, $domain)
    {
        return $this->action(self::GET, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function post($path, $domain)
    {
        return $this->action(self::POST, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function put($path, $domain)
    {
        return $this->action(self::PUT, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function patch($path, $domain)
    {
        return $this->action(self::PATCH, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function head($path, $domain)
    {
        return $this->action(self::HEAD, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function delete($path, $domain)
    {
        return $this->action(self::DELETE, $path, $domain);
    }

    /**
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return Route
     */
    public function options($path, $domain)
    {
        return $this->action(self::OPTIONS, $path, $domain);
    }

    /**
     * @param  string $method
     * @param  string $path
     * @param  string|Action $domainOrAction
     * @return static
     */
    public function action($method, $path, $domainOrAction)
    {
        if ($domainOrAction instanceof Action) {
            $action = $domainOrAction;
        } else {
            $action = new Action($domainOrAction);
        }

        return $this->withValue("$method $path", $action);
    }
}
