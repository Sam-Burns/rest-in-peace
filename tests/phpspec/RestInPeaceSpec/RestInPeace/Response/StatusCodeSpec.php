<?php

namespace RestInPeaceSpec\RestInPeace\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Response\StatusCode;

class StatusCodeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(200);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Response\StatusCode');
    }

    function it_can_be_equal_to_things(StatusCode $another)
    {
        $another->getAsInt()->willReturn(200);
        $this->equals($another)->shouldBe(true);
    }

    function it_can_be_unequal_to_things(StatusCode $another)
    {
        $another->getAsInt()->willReturn(403);
        $this->equals($another)->shouldBe(false);
    }
}
