<?php
namespace RestInPeace\SampleApp\Controller;

use RestInPeace\Response\JsonResponse;
use RestInPeace\SampleApp\Domain\DependencyOfController;

class DiOnlyController
{
    /**
     * @param DependencyOfController $dependency
     */
    public function __construct(DependencyOfController $dependency)
    {
    }

    public function anAction()
    {
        $body = 'Controller which can only be got from Service Container works.';
        $response = new JsonResponse();
        $response->setBody($body);
        return $response;
    }
}
