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
use RestInPeace\Application\ControllerRetrieval\DirectInstantiationControllerRetriever;

class FrontControllerSpec extends ObjectBehavior
{
    function let(
        RouteManager $routeManager,
        RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder,
        DirectInstantiationControllerRetriever $directInstantiationControllerRetriever
    ) {
        $this->beConstructedWith($routeManager, $requestFromSuperglobalsBuilder, $directInstantiationControllerRetriever);
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
        DirectInstantiationControllerRetriever $directInstantiationControllerRetriever,
        JsonResponse $response
    ) {
        $requestFromSuperglobalsBuilder->buildRequest()->willReturn($request);
        $routeManager->getRouteForRequest($request)->willReturn($route);
        $route->getControllerClassname()->willReturn('\RestInPeace\SampleApp\Controller\HelloWorldController');
        $route->getActionName()->willReturn('helloWorldAction');
        $directInstantiationControllerRetriever->getController('\RestInPeace\SampleApp\Controller\HelloWorldController')->willReturn($stubController);
        $stubController->helloWorldAction($request)->willReturn($response);
        $this->buildAndExecuteRequest()->shouldReturn($response);
    }
}
