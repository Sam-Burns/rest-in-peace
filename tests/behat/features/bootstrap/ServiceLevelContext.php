<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;
use Zend\Diactoros\Request;
use DirtyNeedle\DiContainer;
use RestInPeace\FrontController;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use RestInPeace\SampleApp\Storage\InMemoryDataStore;

class ServiceLevelContext implements Context, SnippetAcceptingContext
{
    /** @var PsrResponse */
    private $lastResponse;

    public function __construct()
    {
        require_once __DIR__ . '/../../../../src/bootstrap.php';
        $diContainer = DiContainer::getInstance();
        $diContainer->addConfigFile(APPLICATION_ROOT_DIR . '/sample-app/config/di.php');
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
     * @Then I should get status code :expectedStatusCode
     */
    public function iShouldGetStatusCode($expectedStatusCode)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $expectedStatusCode,
            $this->lastResponse->getStatusCode()
        );
    }

    /**
     * @Given there is a resource of type :resourceType with ID :id and body :body
     */
    public function thereIsAResourceOfTypeWithId($resourceType, $id, $body)
    {
        $dataStore = $this->getDataStore();
        $dataStore->addResource($resourceType, $id, $body);
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
     * @return InMemoryDataStore
     */
    private function getDataStore()
    {
        $diContainer = DiContainer::getInstance();
        return $diContainer->get('restinpeace-sampleapp.inmemorydatastore');
    }

    /**
     * @Then I should get response body :expectedBody
     */
    public function iShouldGetResponseBody($expectedBody)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $expectedBody,
            $this->lastResponse->getBody()
        );
    }
}
