<?php
namespace RestInPeace;

use Psr\Http\Message\RequestInterface as PsrRequest;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use Zend\Diactoros\Response;

class FrontController
{
    /**
     * @param PsrRequest $request
     * @return PsrResponse
     */
    public function getResponseForRequest(PsrRequest $request)
    {
        return new Response;
    }
}
