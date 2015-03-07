<?php
namespace RestInPeace\SampleApp\Controller;

use RestInPeace\Request\Request;
use RestInPeace\Request\RequestFromSuperglobalsBuilder;
use RestInPeace\Response\JsonResponse;

class HelloWorldController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function helloWorldAction(Request $request)
    {
        $response = JsonResponse::constructWithBody('hello world');
        return $response;
    }
}
