<?php

namespace Workflow\HttpHandler;

use Psr\Http\Message\ResponseInterface;
use Throwable;

interface ResponseFactory
{
    public function createFrom(Throwable $e): ResponseInterface;
}