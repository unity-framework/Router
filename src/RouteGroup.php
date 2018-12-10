<?php

namespace Unity\Component\Router;

use Unity\Component\Router\Contracts\IRouteGroup;

class RouteGroup implements IRouteGroup
{
    protected $name;
    protected $data;
    protected $uriPrefix;
}
