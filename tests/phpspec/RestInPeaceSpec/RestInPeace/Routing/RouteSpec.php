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

    function it_can_be_constructed_with_an_array()
    {
        $arrayToConstructFrom = array(
            'controller_classname' => 'ControllerClassname',
            'action_name'          => 'action',
            'method'               => 'GET',
            'path'                 => '/path/'
        );

        $this->beConstructedThrough('constructFromArray', array($arrayToConstructFrom));
        $this->getControllerClassname()->shouldBe('ControllerClassname');
        $this->getActionName()->shouldBe('action');
        $this->getMethod()->shouldBe('GET');
        $this->getPath()->shouldBe('/path/');
    }

    function it_knows_if_it_matches_a_path()
    {
        $this->beConstructedThrough('constructWithPath', array('/path/'));
        $this->matchesPath('/path/')->shouldReturn(true);
        $this->matchesPath('/wrongpath/')->shouldReturn(false);
    }
}
