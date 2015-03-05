<?php
namespace RestInPeace\SampleApp\Controller;

use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;

class HelloWorldController
{
    public function helloWorldAction(Request $request)
    {
        $response = JsonResponse::constructWithBody('hello world');
        return $response;
    }
}
