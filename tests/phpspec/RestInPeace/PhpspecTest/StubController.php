<?php
namespace RestInPeace\PhpspecTest;

use RestInPeace\Response\JsonResponse;
use RestInPeace\Request\Request;

class StubController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function helloWorldAction(Request $request)
    {
    }
}
