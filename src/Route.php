<?php
namespace Spark;

use Spark\Adr\DomainInterface;
use Spark\Adr\RouteInterface;

class Route implements RouteInterface
{

    protected $method;
    protected $path;

    protected $input;
    protected $domain;
    protected $responder;

    public function __construct($method, $path, $handler)
    {
        $this->method = $method;
        $this->path = $path;
        $this->domain = $handler;
    }

    public function setInput($input)
    {
        $this->input = $input;
        return $this;
    }

    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the domain handler for the route
     *
     * @param $domain string|DomainInterface
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function setResponder($responder)
    {
        $this->responder = $responder;
        return $this;
    }

    public function getResponder()
    {
        return $this->responder;
    }

}