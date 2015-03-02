<?php
namespace RestInPeaceSpec\RestInPeace\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Response\JsonResponse');
    }

    function it_can_be_constructed_from_body_string()
    {
        $this->beConstructedThrough('constructWithBody', array('{"message" => "hello world"}'));
        $this->getBody()->shouldBe('{"message" => "hello world"}');
    }
}
