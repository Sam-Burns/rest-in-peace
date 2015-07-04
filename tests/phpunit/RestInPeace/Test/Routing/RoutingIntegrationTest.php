<?php
namespace RestInPeace\Test\Routing;

use RestInPeace\Routing\Router;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\Diactoros\Request;

class RoutingIntegrationTest extends TestCase
{
    public function testMatchingSimpleRoute()
    {
        $this->markTestIncomplete();

        // ARRANGE
        $request = new Request('http://hostname.com/', 'GET');

        $router = new Router();
        $router->addConfig(__DIR__ . '/fixtures/sample_routing_file.php');

        // ACT
        $route = $router->getRouteForRequest($request);

        // ASSERT
        $this->assertEquals('controllers.index', $route->getControllerServiceId());
        $this->assertEquals('indexAction',       $route->getActionMethodName());
    }
}
