<?php
namespace RestInPeaceSpec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Request\Request;
use RestInPeace\Routing\Route;

class RouteManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\RouteManager');
    }

    function it_can_be_configured_from_an_array()
    {
        $configArray = array(
            'routes' => array(
                'hello-world' => array(
                    'path'       => '/hello-world/',
                    'method'     => 'get',
                    'controller' => '\RestInPeace\SampleApp\Controller\HelloWorldController',
                    'action'     => 'helloWorldAction'
                )
            )
        );

        $this->configureFromArray($configArray);

        $request = Request::constructWithPathAndMethod('/hello-world/', 'get');
        $expectedRoute = Route::constructWithControllerAndActionName('\RestInPeace\SampleApp\Controller\HelloWorldController', 'helloWorldAction');

        $this->getRouteForRequest($request)->shouldBeLike($expectedRoute);
    }
}
