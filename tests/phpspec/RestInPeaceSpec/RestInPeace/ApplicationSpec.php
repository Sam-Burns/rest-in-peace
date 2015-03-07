<?php
namespace RestInPeaceSpec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Application\FrontController;
use RestInPeace\Application\ResponseDispatcher;
use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\Route;
use RestInPeace\Config\ConfigFileReader;
use RestInPeace\Routing\RouteManager;

class ApplicationSpec extends ObjectBehavior
{
    function let(
        RouteManager       $routeManager,
        ConfigFileReader   $configFileReader,
        FrontController    $frontController,
        ResponseDispatcher $responseDispatcher
    ) {
        $this->beConstructedWith($routeManager, $configFileReader, $frontController, $responseDispatcher);
    }

    function it_can_be_configured_from_folder(
        RouteManager     $routeManager,
        Route            $route,
        Request          $request
    ) {
        require_once __DIR__ . '/../../../../src-dev/src/bootstrap.php';
        $routeManager->getRouteForRequest($request)->willReturn($route);
        $this->getRouteForRequest($request)->shouldBe($route);
    }

    function it_can_run(FrontController $frontController, JsonResponse $response, ResponseDispatcher $responseDispatcher)
    {
        $frontController->buildAndExecuteRequest()->willReturn($response);
        $responseDispatcher->dispatch($response)->shouldBeCalled();
        $this->run();
    }

    function it_can_run_with_request(FrontController $frontController, JsonResponse $response, ResponseDispatcher $responseDispatcher, Request $request)
    {
        $frontController->executeRequest($request)->willReturn($response);
        $this->getResponseForRequest($request);
    }
}
