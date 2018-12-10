<?php

namespace Unity\Component\Router;

use Unity\Component\Router\Contracts\IRouteGroupFactory;

class RouteGroupFactory implements IRouteGroupFactory
{
    public function make($name, $uriPrefix, $data)
    {
        return null;
    }
}
