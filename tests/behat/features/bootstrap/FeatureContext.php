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
use RestInPeace\BehatTest\Assertions\Assert;

class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var Assert */
    private $assert;

    /** @var JsonResponse */
    private $response;

    public function __construct()
    {
        require_once __DIR__ . '/../../../bootstrap.php';
        $this->assert = new Assert();
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
     * @Then I should get a response containing :partialResponseContent
     */
    public function iShouldGetAResponseContaining($partialResponseContent)
    {
        PHPUnit_Framework_Assert::assertStringContains($partialResponseContent, $this->response->getBody());
    }

    /**
     * @Then the response status code should have been :arg1
     */
    public function theResponseStatusCodeShouldHaveBeen($arg1)
    {
        throw new PendingException();
    }
}
