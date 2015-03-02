<?php
namespace RestInPeace;

use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\RouteManager;

class Application
{
    private $routeManager;

    /**
     * @param RouteManager $routeManager
     */
    public function __construct(RouteManager $routeManager = null)
    {
        $this->routeManager = $routeManager ?: new RouteManager;
    }

    /**
     * @param string $urlPath
     * @return JsonResponse
     */
    public function visit($urlPath)
    {
        return new JsonResponse();
    }

    /**
     * @param string $relativePathToConfigFolder
     */
    public function configureFromFolder($relativePathToConfigFolder)
    {
        $routingData = require_once APPLICATION_ROOT_DIR . $relativePathToConfigFolder;
        $this->routeManager->configureFromArray($routingData);
    }

    /**
     * @param Request $request
     */
    public function getRouteForRequest(Request $request)
    {
        return $this->routeManager->getRouteForRequest($request);
    }
}
