<?php
namespace RestInPeace\Spec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface as PsrRequest;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\Router');
    }

    function it_can_get_a_route_for_a_request(PsrRequest $request)
    {
        $this->getRouteForRequest($request);
    }
}
