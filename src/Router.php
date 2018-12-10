<?php

namespace Unity\Component\Router;

use Unity\Contracts\IRouter\IRouter;
use Psr\Http\Message\RequestInterface;

class Router implements IRouter
{
    protected $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function getParams()
    {
        //
    }

    public function intercept()
    {
        $response = $this->routerResolver->resolve($this->$request);

        return $response;
    }
}
