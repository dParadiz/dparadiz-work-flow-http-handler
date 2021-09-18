# Workflow HTTP request handler

Outline of psr-15 HTTP handler executing workflow. For working implementation following interfaces have to be implemented:

- `Workflow\HttpHandler\RequestContextMapper` - where mapping from `ServerRequestInterface` to initial `Workflow\Context` is specified
- `ResponseFactory` for `Workflow\HttpHandler\Exception\BadRequestException` and any other `Throwable` 

