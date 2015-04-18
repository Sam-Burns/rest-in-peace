<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use RestInPeace\BehatTest\Curl\Guzzle\GuzzleClientAdapter;
use RestInPeace\BehatTest\Curl\CurlResponse;
use RestInPeace\BehatTest\Curl\CurlClient;

class WebserverContext implements Context, SnippetAcceptingContext
{
    /** @var CurlClient */
    private $curlClient;

    /** @var CurlResponse */
    private $response;

    /** @var string */
    private $domain = 'http://localhost:8080';

    /**
     * @param CurlClient|null $curlClient
     */
    public function __construct(CurlClient $curlClient = null)
    {
        $this->curlClient = $curlClient ?: new GuzzleClientAdapter();
    }

    /**
     * @When I visit :urlPath
     */
    public function iVisit($urlPath)
    {
        $this->response = $this->curlClient->get($this->domain . $urlPath);
    }

    /**
     * @Then I should get :content
     */
    public function iShouldGet($content)
    {
        PHPUnit_Framework_Assert::assertEquals($content, $this->response->getBody());
    }

    /**
     * @Then I should get a response containing :arg1
     */
    public function iShouldGetAResponseContaining($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the response status code should have been :arg1
     */
    public function theResponseStatusCodeShouldHaveBeen($arg1)
    {
        throw new PendingException();
    }
}
