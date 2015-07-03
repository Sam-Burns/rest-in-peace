<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;
use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Message\Response as GuzzleResponse;
use Guzzle\Http\Exception\BadResponseException as GuzzleResponseException;

class WebserverContext implements Context, SnippetAcceptingContext
{
    /** @var GuzzleClient */
    private $guzzleClient;

    /** @var GuzzleResponse */
    private $lastResponse;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }

    /**
     * @When I send a GET request to :path
     */
    public function iSendAGetRequestTo($path)
    {
        $request = $this->guzzleClient->get('http://localhost:8081' . $path);

        try {
            $this->lastResponse = $this->guzzleClient->send($request);
        } catch (GuzzleResponseException $guzzleResponseException) {
            $this->lastResponse = $guzzleResponseException->getResponse();
        }
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
