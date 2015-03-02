<?php
namespace RestInPeace\Response;

class JsonResponse
{
    /** @var string */
    private $body = '';

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
    private function setBody($body)
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
}
