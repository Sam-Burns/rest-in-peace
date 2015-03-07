<?php
namespace RestInPeace;

use RestInPeace\Application\FrontController;
use RestInPeace\Application\ResponseDispatcher;
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

    /** @var FrontController */
    private $frontController;

    /** @var ResponseDispatcher */
    private $responseDispatcher;

    /**
     * @param RouteManager|null       $routeManager
     * @param ConfigFileReader|null   $configFileReader
     * @param FrontController|null    $frontController
     * @param ResponseDispatcher|null $responseDispatcher
     */
    public function __construct(
        RouteManager       $routeManager       = null,
        ConfigFileReader   $configFileReader   = null,
        FrontController    $frontController    = null,
        ResponseDispatcher $responseDispatcher = null
    ) {
        $this->routeManager = $routeManager ?: new RouteManager();
        $this->configFileReader = $configFileReader ?: new ConfigFileReader();
        $this->frontController = $frontController ?: new FrontController();
        $this->responseDispatcher = $responseDispatcher ?: new ResponseDispatcher();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getResponseForRequest(Request $request)
    {
        $response = $this->frontController->executeRequest($request);
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

    public function run()
    {
        $response = $this->frontController->buildAndExecuteRequest();
        $this->responseDispatcher->dispatch($response);
    }
}
