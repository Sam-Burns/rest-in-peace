<?php

use Behat\Behat\Tester\Exception\PendingException;
use \Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;

class InlineContext implements Context, SnippetAcceptingContext
{

    /**
     * @Given XXXXXX
     */
    public function xxxxxx()
    {
        throw new PendingException();
    }

    /**
     * @Then XXXXXXX
     */
    public function xxxxxxx()
    {
        throw new PendingException();
    }
}
