<?php
namespace RestInPeaceSpec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\Route');
    }

    function it_can_be_constructed_with_a_controller_and_action_name()
    {
        $this->beConstructedThrough('constructWithControllerAndActionName', array('controller', 'action'));
        $this->getControllerClassname()->shouldBe('controller');
        $this->getActionName()->shouldBe('action');
    }
}
