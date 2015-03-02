<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use RestInPeace\BehatTest\CurlClient\Guzzle as GuzzleClient;
use RestInPeace\BehatTest\CurlClient;

class WebserverContext implements Context, SnippetAcceptingContext
{
    /** @var CurlClient */
    private $curlClient;

    private $response;

    /**
     * @param CurlClient|null $curlClient
     */
    public function __construct(CurlClient $curlClient = null)
    {
        $this->curlClient = $curlClient ?: new GuzzleClient();
    }

    /**
     * @When I visit :urlPath
     */
    public function iVisit($urlPath)
    {

    }

    /**
     * @Then I should get :content
     */
    public function iShouldGet($content)
    {
    }
}
