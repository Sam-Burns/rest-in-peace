<?php
namespace RestInPeace\PhpunitTest\ClassTests\Routing;

use PHPUnit_Framework_TestCase as TestCase;
use RestInPeace\Routing\RouteBuilder;
use RestInPeace\Routing\Route;

class RouteBuilderTest extends TestCase
{
    public function testBuildingRoutes()
    {
        // ARRANGE
        $routeBuilder = new RouteBuilder();
        $routeBuilder->addConfigFile('tests/phpunit/fixtures/config_files/example_routing_file.php');

        // ACT
        $result = $routeBuilder->getRoutes();
        /** @var $result Route[] */

        // ASSERT
        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('\RestInPeace\Routing\Route', $result[0]);
        $this->assertEquals($result[0]->getControllerServiceId(), 'service-id');
    }
}
