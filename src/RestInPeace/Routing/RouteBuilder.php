<?php
namespace RestInPeace\Routing;

use RestInPeace\Config\ConfigFileReader;

class RouteBuilder
{
    /** @var ConfigFileReader */
    private $configFileReader;

    /** @var array */
    private $routingConfig = array();

    /**
     * @param ConfigFileReader|null $configFileReader
     */
    public function __construct(ConfigFileReader $configFileReader = null)
    {
        $this->configFileReader = $configFileReader ?: new ConfigFileReader();
    }

    /**
     * @param string $path
     */
    public function addConfigFile($path)
    {
        $this->routingConfig = array_merge_recursive($this->routingConfig, $this->configFileReader->read($path));
    }

    /**
     * @return Route[]
     */
    public function getRoutes()
    {
        $routes = array();
        foreach ($this->routingConfig['rest-in-peace']['routes'] as $routeConfig) {
            $routes[] = Route::constructFromArray($routeConfig);
        }
        return $routes;
    }
}
