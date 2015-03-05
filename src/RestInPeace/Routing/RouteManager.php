<?php
namespace RestInPeace\Routing;

use RestInPeace\Request\Request;

class RouteManager
{
    /** @var array */
    private $configArray;

    /**
     * @param array $configArray
     */
    public function configureFromArray($configArray)
    {
        $this->configArray = $configArray;
    }

    /**
     * @param Request $request
     * @return Route
     */
    public function getRouteForRequest(Request $request)
    {
        $route = Route::constructWithControllerAndActionName(
            '\RestInPeace\SampleApp\Controller\HelloWorldController',
            'helloWorldAction'
        );
        return $route;
    }
}
