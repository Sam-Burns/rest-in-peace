<?php

namespace RestInPeace\Request;

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
        $request->setPath($path);
        $request->setMethod($method);
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

    /**
     * @param string $path
     */
    private function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param string $method
     */
    private function setMethod($method)
    {
        $this->method = $method;
    }
}
