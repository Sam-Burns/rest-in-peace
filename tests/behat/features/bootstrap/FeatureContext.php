<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use RestInPeace\Application;
use RestInPeace\Response\JsonResponse;

class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var JsonResponse */
    private $response;

    public function __construct()
    {
        require_once __DIR__ . '/../../../../src-dev/src/bootstrap.php';
    }

    /**
     * @When I visit :urlPath
     */
    public function iVisit($urlPath)
    {
        $application = new Application;
        $application->configureFromFolder('/src-dev/config');
        $this->response = $application->visit($urlPath);
    }

    /**
     * @Then I should get :content
     */
    public function iShouldGet($content)
    {
        PHPUnit_Framework_Assert::assertEquals($content, $this->response->getBody());
    }
}
