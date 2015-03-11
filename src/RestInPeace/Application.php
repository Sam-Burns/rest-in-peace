<?php
namespace RestInPeace;

use RestInPeace\Application\FrontController;
use RestInPeace\Application\ResponseDispatcher;
use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\RouteManager;
use RestInPeace\Routing\Route;

class Application
{
    /** @var RouteManager */
    private $routeManager;

    /** @var FrontController */
    private $frontController;

    /** @var ResponseDispatcher */
    private $responseDispatcher;

    /**
     * @param RouteManager|null       $routeManager
     * @param FrontController|null    $frontController
     * @param ResponseDispatcher|null $responseDispatcher
     */
    public function __construct(
        RouteManager       $routeManager       = null,
        FrontController    $frontController    = null,
        ResponseDispatcher $responseDispatcher = null
    ) {
        $this->routeManager = $routeManager ?: new RouteManager();
        $this->frontController = $frontController ?: new FrontController($this->routeManager);
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
     * @param string[] $filenames
     */
    public function configureFromFiles(array $filenames)
    {
        foreach ($filenames as $filename) {
            $this->routeManager->addConfigFile($filename);
        }
    }

    public function run()
    {
        $response = $this->frontController->buildAndExecuteRequest();
        $this->responseDispatcher->dispatch($response);
    }
}
