<?php
namespace RestInPeace\Application;

use RestInPeace\Response\JsonResponse;

class ResponseDispatcher
{
    /**
     * @param JsonResponse $response
     */
    public function dispatch(JsonResponse $response)
    {
        echo $response->getBody();
    }
}
