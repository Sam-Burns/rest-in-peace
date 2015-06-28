<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;
use Zend\Diactoros\Request;
use DirtyNeedle\DiContainer;
use RestInPeace\FrontController;
use Psr\Http\Message\ResponseInterface as PsrResponse;

class ServiceLevelContext implements Context, SnippetAcceptingContext
{
    /** @var PsrResponse */
    private $lastResponse;

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
        $this->lastResponse = $frontController->getResponseForRequest($request);
    }

    /**
     * @return FrontController
     */
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
        PHPUnit_Framework_Assert::assertEquals(
            $expectedStatusCode,
            $this->lastResponse->getStatusCode()
        );
    }
}
