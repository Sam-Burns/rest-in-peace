<?php
namespace RestInPeace\Test;

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
        // @todo Some kind of router ingestion of config file

        // ACT
        $route = $router->getRouteForRequest($request);

        // ASSERT
        $this->assertEquals('controllers.index', $route->getControllerServiceId());
        $this->assertEquals('indexAction',       $route->getActionMethodName());
    }
}
