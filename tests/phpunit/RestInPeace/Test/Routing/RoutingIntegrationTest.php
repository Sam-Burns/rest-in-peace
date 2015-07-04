<?php
namespace RestInPeace\Test\Routing;

use RestInPeace\Routing\Router;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\Diactoros\Request;
use ConfigTree\Builder\ConfigTreeBuilder;

class RoutingIntegrationTest extends TestCase
{
    public function testMatchingSimpleRoute()
    {
        $this->markTestIncomplete();

        // ARRANGE
        $request = new Request('http://hostname.com/', 'GET');
        $router = $this->getRouter();

        // ACT
        $route = $router->getRouteForRequest($request);

        // ASSERT
        $this->assertInstanceOf('\RestInPeace\Routing\Route', $route);
        $this->assertEquals('controllers.index', $route->getControllerServiceId());
        $this->assertEquals('indexAction',       $route->getActionMethodName());
    }

    /**
     * @return Router
     */
    private function getRouter()
    {
        $configBuilder = new ConfigTreeBuilder();
        $configBuilder->addSettingsFromPaths([__DIR__ . '/fixtures/sample_routing_file.php']);
        $wholeConfig = $configBuilder->buildConfigTreeAndReset();
        $routingConfig = $wholeConfig->getSubtreeFromPath('rest-in-peace/routing');
        return new Router($routingConfig);
    }
}
