<?php
namespace RestInPeace\TestFixtures\Controller;

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
