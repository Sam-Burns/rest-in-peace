<?php
namespace RestInPeace;

use DirtyNeedle\DiContainer;
use RestInPeace\Application\FrontController;
use RestInPeace\Application\ResponseDispatcher;
use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;

class Application
{
    /** @var FrontController */
    private $frontController;

    /** @var ResponseDispatcher */
    private $responseDispatcher;

    public function __construct()
    {
        $dic = DiContainer::getInstance();
        $dic->addConfigFile(__DIR__ . '/../../config/dirty-needle/di.php');

        $this->frontController    = $dic->get('rest-in-peace.frontcontroller');
        $this->responseDispatcher = $dic->get('rest-in-peace.responsedispatcher');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getResponseForRequest(Request $request)
    {
        return $this->frontController->executeRequest($request);
    }

    /**
     * @param string[] $filenames
     */
    public function configureFromFiles(array $filenames)
    {
        $this->frontController->configureFromFiles($filenames);
    }

    public function run()
    {
        $response = $this->frontController->buildAndExecuteRequest();
        $this->responseDispatcher->dispatch($response);
    }
}
