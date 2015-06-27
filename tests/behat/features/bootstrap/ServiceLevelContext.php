<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;

class ServiceLevelContext implements Context, SnippetAcceptingContext
{

    /**
     * @When I send a GET request to :arg1
     */
    public function iSendAGetRequestTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get status code :arg1
     */
    public function iShouldGetStatusCode($arg1)
    {
        throw new PendingException();
    }
}
