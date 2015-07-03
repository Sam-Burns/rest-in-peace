<?php
namespace RestInPeace\Spec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\Router');
    }
}
