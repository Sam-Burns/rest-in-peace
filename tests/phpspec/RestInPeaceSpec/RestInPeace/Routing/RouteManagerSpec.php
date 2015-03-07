<?php
namespace RestInPeaceSpec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Request\Request;
use RestInPeace\Routing\Route;
use RestInPeace\Routing\RouteBuilder;

class RouteManagerSpec extends ObjectBehavior
{
    function let(RouteBuilder $routeBuilder)
    {
        $this->beConstructedWith($routeBuilder);
    }

    function it_can_get_a_route_for_a_reqeust(RouteBuilder $routeBuilder)
    {
        $route = Route::constructWithPath('/path/');
        $routeBuilder->getRoutes()->willReturn(array($route));

        $request = Request::constructWithPathAndMethod('/path/', 'GET');

        $this->getRouteForRequest($request)->shouldBe($route);
    }
}
