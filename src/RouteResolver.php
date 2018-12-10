<?php

namespace Unity\Component\Router;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RouteResolver implements IRouteResolver
{
    /** @var ResponseInterface */
    protected $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Resolves the current `$request`
     *
     * @return ResponseInterface
     */
    public function resolve(RequestInterface $request)
    {
        return $this->$response;
    }
}
