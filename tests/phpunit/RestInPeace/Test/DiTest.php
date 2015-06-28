<?php
namespace RestInPeace\Test;

use DirtyNeedle\DiContainer;
use PHPUnit_Framework_TestCase as TestCase;

class DiTest extends TestCase
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
