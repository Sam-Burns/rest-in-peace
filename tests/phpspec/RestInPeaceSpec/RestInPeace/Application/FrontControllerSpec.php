<?php
namespace RestInPeaceSpec\RestInPeace\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\PhpspecTest\StubController;
use RestInPeace\Request\Request;
use RestInPeace\Request\RequestFromSuperglobalsBuilder;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\Route;
use RestInPeace\Routing\RouteManager;
use RestInPeace\Application\ControllerRetrieval\ControllerRetriever;

class FrontControllerSpec extends ObjectBehavior
{
    function let(
        RouteManager                   $routeManager,
        RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder,
        ControllerRetriever            $controllerRetriever
    ) {
        $this->beConstructedWith($routeManager, $requestFromSuperglobalsBuilder, $controllerRetriever);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Application\FrontController');
    }

    function it_can_build_and_execute_a_request(
        RouteManager                   $routeManager,
        Route                          $route,
        RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder,
        Request                        $request,
        StubController                 $stubController,
        ControllerRetriever            $controllerRetriever,
        JsonResponse                   $response
    ) {
        $requestFromSuperglobalsBuilder->buildRequest()->willReturn($request);
        $routeManager->getRouteForRequest($request)->willReturn($route);
        $route->getControllerServiceId()->willReturn('controller-service-id');
        $route->getActionName()->willReturn('helloWorldAction');
        $controllerRetriever->getController('controller-service-id')->willReturn($stubController);
        $stubController->helloWorldAction($request)->willReturn($response);
        $this->buildAndExecuteRequest()->shouldReturn($response);
    }

    function it_can_execute_a_request(
        RouteManager        $routeManager,
        Route               $route,
        Request             $request,
        StubController      $stubController,
        ControllerRetriever $controllerRetriever,
        JsonResponse        $response
    ) {
        $routeManager->getRouteForRequest($request)->willReturn($route);
        $route->getControllerServiceId()->willReturn('controller-service-id');
        $route->getActionName()->willReturn('helloWorldAction');
        $controllerRetriever->getController('controller-service-id')->willReturn($stubController);
        $stubController->helloWorldAction($request)->willReturn($response);
        $this->executeRequest($request)->shouldReturn($response);
    }
}
