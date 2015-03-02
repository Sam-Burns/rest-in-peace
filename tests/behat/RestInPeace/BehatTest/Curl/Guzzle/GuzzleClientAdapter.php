<?php
namespace RestInPeace\BehatTest\Curl\Guzzle;

use Guzzle\Http\Client as GuzzleClient;
use RestInPeace\BehatTest\Curl\CurlClient;
use RestInPeace\BehatTest\Curl\CurlResponse;

class GuzzleClientAdapter implements CurlClient
{
    /** @var GuzzleClient */
    private $guzzleClient;

    /**
     * @param GuzzleClient|null $guzzleClient
     */
    public function __construct(GuzzleClient $guzzleClient = null)
    {
        $this->guzzleClient = $guzzleClient ?: new GuzzleClient();
    }

    /**
     * @param string $url
     * @return CurlResponse
     */
    public function get($url)
    {
        $guzzleResponse = $this->guzzleClient->get($url);
        return new GuzzleResponseAdapter($guzzleResponse);
    }
}
