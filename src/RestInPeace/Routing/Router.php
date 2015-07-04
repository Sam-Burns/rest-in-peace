<?php
namespace RestInPeace\Routing;

use Psr\Http\Message\RequestInterface as PsrRequest;

class Router
{
    /**
     * @param PsrRequest $request
     * @return Route
     */
    public function getRouteForRequest(PsrRequest $request)
    {
        // TODO: write logic here
    }
}
