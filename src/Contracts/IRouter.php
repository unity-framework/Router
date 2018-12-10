<?php

namespace Unity\Contracts\IRouter;

interface IRouter
{
    public function intercept();

    public function getParams();

    public function getInputs();

    public function getHeader($name);

    public function getHeaders();

    public function addHeader();
}
