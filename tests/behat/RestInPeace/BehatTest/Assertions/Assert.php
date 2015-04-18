<?php
namespace RestInPeace\BehatTest\Assertions;

use PHPUnit_Framework_Assert;

class Assert
{
    /**
     * @param string $substring
     * @param string $superstring
     */
    public function stringContains($substring, $superstring)
    {
        $containsSubstring = strpos($superstring, $substring) !== false;
        PHPUnit_Framework_Assert::assertTrue(
            $containsSubstring,
            "Failed asserting '$superstring' contains '$substring''"
        );
    }
}
