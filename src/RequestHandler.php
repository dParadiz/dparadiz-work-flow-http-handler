<?php declare(strict_types=1);

namespace Workflow\HttpHandler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;
use Workflow\Workflow;


final class RequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private Workflow             $workflow,
        private RequestContextMapper $mapper,
        private ResponseFactory      $badRequestResponse,
        private ResponseFactory      $internalServerErrorResponse,
    )
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $context = $this->mapper->mapToContext($request);
        } catch (Exception\BadRequestException $e) {
            return $this->badRequestResponse->createFrom($e);
        }

        try {
            return $this->workflow->execute($context);
        } catch (Throwable $e) {
            return $this->internalServerErrorResponse->createFrom($e);
        }
    }
}