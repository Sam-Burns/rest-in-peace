<?php

namespace RestInPeaceSpec\RestInPeace\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Response\JsonResponse;

class ResponseDispatcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Application\ResponseDispatcher');
    }

    function it_can_dispatch_the_response(JsonResponse $response)
    {
        $this->dispatch($response);
    }
}
