<?php

namespace RestInPeace\Spec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FrontControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\FrontController');
    }
}
