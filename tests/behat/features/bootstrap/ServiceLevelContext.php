<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;
use Zend\Diactoros\Request;
use DirtyNeedle\DiContainer;
//use RestInPeace\FrontController;

class ServiceLevelContext implements Context, SnippetAcceptingContext
{
    public function __construct()
    {
        require_once __DIR__ . '/../../../../src/bootstrap.php';
    }

    /**
     * @When I send a GET request to :path
     */
    public function iSendAGetRequestTo($path)
    {
        $request = new Request($path, 'GET');
        $frontController = $this->getFrontController();
        $response = $frontController->getResponseForRequest($request);
    }

    private function getFrontController()
    {
        $diContainer = DiContainer::getInstance();
        return $diContainer->get('restinpeace.frontcontroller');
    }

    /**
     * @Then I should get status code :expectedStatusCode
     */
    public function iShouldGetStatusCode($expectedStatusCode)
    {
        throw new PendingException();
    }
}
