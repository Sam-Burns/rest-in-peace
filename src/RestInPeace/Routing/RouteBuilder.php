<?php
namespace RestInPeace\Routing;

use ConfigTree\Tree\ConfigTree;

class RouteBuilder
{
    /**
     * @param ConfigTree $config
     * @return Route[]
     */
    public function buildRoutesFromConfig(ConfigTree $config)
    {
        $configArray = $config->toArray();

        $routes = [];

        foreach ($configArray as $routeName => $routeDetails) {
            $routes[] = new Route(
                $routeName,
                $routeDetails['route'],
                $routeDetails['method'],
                $routeDetails['controller-service-id'],
                $routeDetails['action-method-name']
            );
        }

        return $routes;
    }
}
