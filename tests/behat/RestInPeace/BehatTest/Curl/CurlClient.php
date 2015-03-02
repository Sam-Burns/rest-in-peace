<?php
namespace RestInPeace\BehatTest\Curl;

interface CurlClient
{
    /**
     * @param string $url
     * @return string
     */
    public function get($url);
}
