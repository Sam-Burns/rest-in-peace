<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use RestInPeace\Application;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Request\Request;
use DirtyNeedle\DiContainer;

class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var JsonResponse */
    private $response;

    public function __construct()
    {
        require_once __DIR__ . '/../../../../src-dev/bootstrap.php';
    }

    /**
     * @When I visit :urlPath
     */
    public function iVisit($urlPath)
    {
        DiContainer::getInstance()->addConfigFile(APPLICATION_ROOT_DIR . '/config/dirty-needle/di.php');

        $application = new Application;
        $application->configureFromFiles([APPLICATION_ROOT_DIR . '/config/rest-in-peace/routing.php']);
        $request = Request::constructWithPathAndMethod($urlPath, 'GET');
        $this->response = $application->getResponseForRequest($request);
    }

    /**
     * @Then I should get :content
     */
    public function iShouldGet($content)
    {
        PHPUnit_Framework_Assert::assertEquals($content, $this->response->getBody());
    }

    /**
     * @Then the status code of the HTTP response should be :expectedStatusCode
     */
    public function theStatusCodeOfTheHttpResponseShouldBe($expectedStatusCode)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $expectedStatusCode,
            $this->response->getStatusCode()
        );
    }
}
