<?php
namespace RestInPeace\Spec\RestInPeace\Routing;

use ConfigTree\Tree\ConfigTree;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface as PsrRequest;
use RestInPeace\Routing\Route;
use RestInPeace\Routing\RouteBuilder;
use Zend\Diactoros\Uri;

class RouterSpec extends ObjectBehavior
{
    function let(RouteBuilder $routeBuilder, ConfigTree $configTree)
    {
        $this->beConstructedWith($routeBuilder, $configTree);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Routing\Router');
    }

    function it_can_get_a_route_for_a_request(PsrRequest $request, Uri $uri, RouteBuilder $routeBuilder, Route $route)
    {
        $request->getMethod()->willReturn('GET');
        $request->getUri()->willReturn($uri);
        $uri->getPath()->willReturn('/');

        $route->getPath()->willReturn('/');
        $route->getHttpMethod()->willReturn('GET');

        $routeBuilder->buildRoutesFromConfig(Argument::type('\ConfigTree\Tree\ConfigTree'))->willReturn([$route]);

        $this->getRouteForRequest($request)->shouldReturn($route);
    }
}
