<?php
namespace RestInPeace\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class RequestFromSuperglobalsBuilder
{
    /**
     * @return Request
     */
    public function buildRequest()
    {
        $symfonyRequest = SymfonyRequest::createFromGlobals();
        $method = $symfonyRequest->getMethod();
        $path = $symfonyRequest->getPathInfo();
        return Request::constructWithPathAndMethod($path, $method);
    }
}
