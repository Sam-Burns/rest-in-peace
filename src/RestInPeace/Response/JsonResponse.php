<?php
namespace RestInPeace\Response;

class JsonResponse
{
    /** @var string */
    private $body = '';

    /** @var StatusCode */
    private $statusCode;

    /**
     * @param $bodyString
     * @return JsonResponse
     */
    public static function constructWithBody($bodyString)
    {
        $jsonResponse = new JsonResponse();
        $jsonResponse->setBody($bodyString);
        return $jsonResponse;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param StatusCode|int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        if ($statusCode instanceof StatusCode) {
            $this->statusCode = $statusCode;
        } elseif (is_int($statusCode)) {
            $this->statusCode = new StatusCode($statusCode);
        }
        // @todo should throw something here
    }

    /**
     * @return StatusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
