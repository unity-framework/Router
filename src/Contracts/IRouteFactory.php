<?php

namespace Unity\Component\Router\Contracts;

interface IRouteFactory
{
    public function make($uri, $callback);
}
