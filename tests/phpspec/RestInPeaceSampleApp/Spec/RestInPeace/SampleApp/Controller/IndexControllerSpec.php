<?php
namespace RestInPeaceSampleApp\Spec\RestInPeace\SampleApp\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IndexControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\SampleApp\Controller\IndexController');
    }

    function it_has_an_index_action()
    {
        $this->indexAction();
    }
}
