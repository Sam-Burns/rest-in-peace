<?php
namespace RestInPeace\Routing;

use RestInPeace\Request\Request;

class RouteManager
{
    /** @var array */
    private $configArray;

    /**
     * @var RouteBuilder
     */
    private $routeBuilder;

    /** @var Route[] */
    private $routes;

    /**
     * @param RouteBuilder $routeBuilder
     */
    public function __construct(RouteBuilder $routeBuilder = null)
    {
        $this->routeBuilder = $routeBuilder ?: new RouteBuilder();
    }

    /**
     * @param array $configArray
     */
    public function configureFromArray($configArray)
    {
        $this->configArray = $configArray;
    }

    /**
     * @param string $path
     */
    public function addConfigFile($path)
    {
        $this->routeBuilder->addConfigFile($path);
    }

    /**
     * @throws \Exception
     *
     * @param Request $request
     * @return Route
     */
    public function getRouteForRequest(Request $request)
    {
        foreach ($this->getRoutes() as $route) {
            if ($route->matchesPath($request->getPath())) {
                return $route;
            }
        }

        throw new \Exception('404');
    }

    /**
     * @return Route[]
     */
    private function getRoutes()
    {
        if (!$this->routes) {
            $this->routes = $this->routeBuilder->getRoutes();
        }
        return $this->routes;
    }
}
