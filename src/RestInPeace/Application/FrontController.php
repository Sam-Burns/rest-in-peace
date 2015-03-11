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
        RouteManager                   $routeManager                   = null,
        RequestFromSuperglobalsBuilder $requestFromSuperglobalsBuilder = null,
        ControllerRetriever            $controllerRetriever            = null
    ) {
        $this->routeManager                   = $routeManager                   ?: new RouteManager();
        $this->requestFromSuperglobalsBuilder = $requestFromSuperglobalsBuilder ?: new RequestFromSuperglobalsBuilder();
        $this->controllerRetriever            = $controllerRetriever            ?: new DirectInstantiationControllerRetriever();
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
        $controllerClassname = $route->getControllerClassname();
        $actionName = $route->getActionName();
        $controller = $this->controllerRetriever->getController($controllerClassname);
        $response = $controller->$actionName($request);
        return $response;
    }
}
