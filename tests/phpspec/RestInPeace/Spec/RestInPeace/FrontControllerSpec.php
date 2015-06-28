<?php
namespace RestInPeace\Spec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface;

class FrontControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\FrontController');
    }

    function it_can_return_http_responses(RequestInterface $request)
    {
        $response = $this->getResponseForRequest($request);
    }
}
