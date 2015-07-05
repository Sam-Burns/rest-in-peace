<?php
namespace RestInPeace\Spec\RestInPeace\Routing;

use ConfigTree\Tree\ConfigTree;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Routing\Route;

class RouteBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('\RestInPeace\Routing\RouteBuilder');
    }

    function it_can_build_routes_from_the_routing_config()
    {
        $config = $this->getSampleConfig();
        $expectedRoutes = [new Route('index', '/', 'GET', 'controllers.index', 'indexAction')];
        $this->buildRoutesFromConfig($config)->shouldBeLike($expectedRoutes);
    }

    /**
     * @return ConfigTree
     */
    private function getSampleConfig()
    {
        $routingConfigArray = [
            'index' => [
                'route'                 => '/',
                'method'                => 'GET',
                'controller-service-id' => 'controllers.index',
                'action-method-name'    => 'indexAction',
            ],
        ];
        return new ConfigTree($routingConfigArray);
    }
}
