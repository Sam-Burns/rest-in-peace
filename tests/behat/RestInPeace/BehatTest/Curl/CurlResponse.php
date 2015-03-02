<?php
namespace RestInPeace\BehatTest\Curl;

interface CurlResponse
{
    /**
     * @return string
     */
    public function getBody();
}
