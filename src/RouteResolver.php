<?php

namespace Unity\Contracts\IRouteResolver;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RouteResolver implements IRouteResolver
{
    /** @var ResponseInterface */
    public $response;

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
