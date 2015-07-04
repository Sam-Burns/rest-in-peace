<?php
namespace RestInPeace\Test\DependencyInjection;

use DirtyNeedle\DiContainer;
use PHPUnit_Framework_TestCase as TestCase;

class DiConfigTest extends TestCase
{
    public function testCanGetFrontControllerFromDi()
    {
        // ARRANGE
        $container = DiContainer::getInstance();

        // ACT
        $frontController = $container->get('restinpeace.frontcontroller');

        // ASSERT
        $this->assertInstanceOf('\RestInPeace\FrontController', $frontController);
    }
}
