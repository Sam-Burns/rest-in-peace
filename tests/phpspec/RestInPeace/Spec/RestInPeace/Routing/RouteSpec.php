<?php
namespace RestInPeace\Spec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('index', '/', 'GET', 'controllers.index', 'indexAction');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\Route');
    }

    function it_can_provide_a_controller_service_id()
    {
        $this->getControllerServiceId()->shouldBe('controllers.index');
    }

    function it_can_provide_an_action_method_name()
    {
        $this->getActionMethodName()->shouldBe('indexAction');
    }
}
