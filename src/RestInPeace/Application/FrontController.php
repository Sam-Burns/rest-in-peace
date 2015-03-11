<?php
namespace RestInPeace\Application;

use RestInPeace\Routing\RouteManager;
use RestInPeace\Request\RequestFromSuperglobalsBuilder;
use RestInPeace\Application\ControllerRetrieval\DirectInstantiationControllerRetriever;
use RestInPeace\Application\ControllerRetrieval\ControllerRetriever;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Request\Request;

class FrontController
{
    /** @var RouteManager */
    private $routeManager;

    /** @var RequestFromSuperglobalsBuilder */
    private $requestFromSuperglobalsBuilder;

    /** @var ControllerRetriever */
    private $controllerRetriever;

    /**
     * @param RouteManager                   $routeManager
     * @param RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder
     * @param ControllerRetriever            $controllerRetriever
     */
    public function __construct(
        RouteManager                   $routeManager,
        RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder,
        ControllerRetriever            $controllerRetriever
    ) {
        $this->routeManager                   = $routeManager;
        $this->requestFromSuperglobalsBuilder = $requestFromSuperglobalsBuilder;
        $this->controllerRetriever            = $controllerRetriever;
    }

    /**
     * @param string[] $filenames
     */
    public function configureFromFiles(array $filenames)
    {
        foreach ($filenames as $filename) {
            $this->routeManager->addConfigFile($filename);
        }
    }

    /**
     * @return JsonResponse
     */
    public function buildAndExecuteRequest()
    {
        $request = $this->requestFromSuperglobalsBuilder->buildRequest();
        return $this->executeRequest($request);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function executeRequest(Request $request)
    {
        $route = $this->routeManager->getRouteForRequest($request);
        $controllerServiceId = $route->getControllerServiceId();
        $actionName = $route->getActionName();
        $controller = $this->controllerRetriever->getController($controllerServiceId);
        $response = $controller->$actionName($request);
        return $response;
    }
}
