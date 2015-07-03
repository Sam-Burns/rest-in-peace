<?php
namespace RestInPeace\Spec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Application');
    }

    function it_can_be_run()
    {
        $this->run();
    }
}
