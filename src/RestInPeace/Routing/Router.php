<?php
namespace RestInPeace\Routing;

use ConfigTree\Tree\ConfigTree;
use Psr\Http\Message\RequestInterface as PsrRequest;

class Router
{
    /** @var RouteBuilder */
    private $routeBuilder;

    /** @var ConfigTree */
    private $routingConfig;

    /**
     * @param RouteBuilder $routeBuilder
     * @param ConfigTree   $routingConfig
     */
    public function __construct(RouteBuilder $routeBuilder, ConfigTree $routingConfig)
    {
        $this->routeBuilder = $routeBuilder;
        $this->routingConfig = $routingConfig;
    }

    /**
     * @param PsrRequest $request
     * @return Route
     */
    public function getRouteForRequest(PsrRequest $request)
    {
        $method = $request->getMethod();
        $path = $request->getUri()->getPath();

        $routes = $this->routeBuilder->buildRoutesFromConfig($this->routingConfig);

        foreach ($routes as $route) {
            if ($route->getPath() === $path && $route->getHttpMethod() === $method) {
                return $route;
            }
        }
    }
}
