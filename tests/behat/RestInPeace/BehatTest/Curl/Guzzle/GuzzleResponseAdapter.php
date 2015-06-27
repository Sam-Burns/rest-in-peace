<?php
namespace RestInPeace\BehatTest\Curl\Guzzle;

use Guzzle\Http\Message\Response as GuzzleResponse;
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
        $responseBody = $this->guzzleResponse->getBody(true);
        return $responseBody;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->guzzleResponse->getStatusCode();
    }
}
