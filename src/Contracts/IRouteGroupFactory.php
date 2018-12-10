<?php

namespace Unity\Component\Router\Contracts;

interface IRouteGroupFactory
{
    public function make($name, $uriPrefix, $data);
}
