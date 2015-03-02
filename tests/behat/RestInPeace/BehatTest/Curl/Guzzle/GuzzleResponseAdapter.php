<?php
namespace RestInPeace\BehatTest\Curl\Guzzle;

use Guzzle\Http\Message\RequestInterface as GuzzleResponse;
use RestInPeace\BehatTest\Curl\CurlResponse;

class GuzzleResponseAdapter implements CurlResponse
{
    /** @var GuzzleResponse */
    private $guzzleResponse;

    /**
     * @param GuzzleResponse $guzzleResponse
     */
    public function __construct(GuzzleResponse $guzzleResponse)
    {
        $this->guzzleResponse = $guzzleResponse;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        $responseBody = $this->guzzleResponse->getResponseBody();
        return (string)$responseBody;
    }
}
