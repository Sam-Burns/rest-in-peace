<?php

namespace RestInPeaceSpec\RestInPeace\Request;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Request\Request');
    }

    function it_can_be_constructed_with_path_and_method()
    {
        $this->beConstructedThrough('constructWithPathAndMethod', array('/hello-world/', 'GET'));
        $this->getPath()->shouldBe('/hello-world/');
        $this->getMethod()->shouldBe('GET');
    }
}
