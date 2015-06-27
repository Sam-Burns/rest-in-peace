<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;

class ServiceLevelContext implements Context, SnippetAcceptingContext
{
    /**
     * @When I send a GET request to :path
     */
    public function iSendAGetRequestTo($path)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get status code :expectedStatusCode
     */
    public function iShouldGetStatusCode($expectedStatusCode)
    {
        throw new PendingException();
    }
}
