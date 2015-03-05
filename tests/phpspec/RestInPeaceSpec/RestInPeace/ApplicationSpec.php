<?php
namespace RestInPeaceSpec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\Route;
use RestInPeace\Config\ConfigFileReader;
use RestInPeace\Routing\RouteManager;

class ApplicationSpec extends ObjectBehavior
{
    function let(RouteManager $routeManager, ConfigFileReader $configFileReader)
    {
        $this->beConstructedWith($routeManager, $configFileReader);
    }

//    function it_can_get_a_json_response()
//    {
//        $this->visit('/url/')->shouldBeLike(JsonResponse::constructWithBody(''));
//    }

    function it_can_be_configured_from_folder(
        RouteManager     $routeManager,
        ConfigFileReader $configFileReader,
        Route            $route,
        Request          $request
    ) {

        require_once __DIR__ . '/../../../../src-dev/src/bootstrap.php';

        $routeManager->getRouteForRequest($request)->willReturn($route);

        $this->getRouteForRequest($request)->shouldBe($route);
    }

//    function it_can_visit_a_page(RouteManager $routeManager, Route $route, Request $request)
//    {
//        $routeManager->getRouteForRequest($request)->willReturn($route);
//        $this->visit->shouldReturn('');
//    }
}
