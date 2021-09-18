<?php

namespace Workflow\HttpHandler;

use Psr\Http\Message\ServerRequestInterface;
use Workflow\Context;

interface RequestContextMapper
{

    public function mapToContext(ServerRequestInterface $request): Context;
}