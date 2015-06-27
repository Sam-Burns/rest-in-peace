<?php
namespace RestInPeaceSpec\RestInPeace\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Response\StatusCode;

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

    function it_has_a_status_code(StatusCode $statusCode)
    {
        $this->setStatusCode($statusCode);
        $this->getStatusCode()->shouldBe($statusCode);
    }

    function it_can_accept_ints_as_status_codes()
    {
        $expectedResult = new StatusCode(404);

        $this->setStatusCode(404);
        $this->getStatusCode()->equals($expectedResult)->shouldBe(true);
    }
}
