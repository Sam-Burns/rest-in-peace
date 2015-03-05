<?php
namespace RestInPeace;

use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\RouteManager;
use RestInPeace\Config\ConfigFileReader;
use RestInPeace\Routing\Route;

class Application
{
    /** @var RouteManager */
    private $routeManager;

    /** @var ConfigFileReader */
    private $configFileReader;

    /**
     * @param RouteManager|null     $routeManager
     * @param ConfigFileReader|null $configFileReader
     */
    public function __construct(RouteManager $routeManager = null, ConfigFileReader $configFileReader = null)
    {
        $this->routeManager = $routeManager ?: new RouteManager();
        $this->configFileReader = $configFileReader ?: new ConfigFileReader();
    }

    /**
     * @param string $urlPath
     * @return JsonResponse
     */
    public function visit($urlPath)
    {
        $request = new Request();
        $route = $this->getRouteForRequest($request);
        $controllerName = $route->getControllerClassname();
        $actionName = $route->getActionName();
        $controllerObject = new $controllerName;
        $response = call_user_func_array(array($controllerObject, $actionName), array($request));
        return $response;
    }

    /**
     * @param string $relativePathToConfigFolder
     */
    public function configureFromFolder($relativePathToConfigFolder)
    {
        $routingData = $this->configFileReader->read(APPLICATION_ROOT_DIR . $relativePathToConfigFolder . '/routing.php');
        $this->routeManager->configureFromArray($routingData);
    }

    /**
     * @param Request $request
     * @return Route
     */
    public function getRouteForRequest(Request $request)
    {
        return $this->routeManager->getRouteForRequest($request);
    }
}
