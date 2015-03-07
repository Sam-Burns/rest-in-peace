<?php
namespace RestInPeace\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request
{
    /** @var string */
    private $method;

    /** @var string */
    private $path;

    /**
     * @param string $path
     * @param string $method
     * @return Request
     */
    public static function constructWithPathAndMethod($path, $method)
    {
        $request = new Request();
        $request->path = $path;
        $request->method = $method;
        return $request;
    }

    /**
     * @param SymfonyRequest $symfonyRequest
     * @return Request
     */
    public static function constructFromSymfonyRequest(SymfonyRequest $symfonyRequest)
    {
        $request = new Request();
        $request->path   = $symfonyRequest->getPathInfo();
        $request->method = $symfonyRequest->getMethod();
        return $request;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
