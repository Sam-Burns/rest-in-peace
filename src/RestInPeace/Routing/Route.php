<?php

namespace RestInPeace\Routing;

class Route
{
    /** @var string */
    private $controllerClassname;

    /** @var string */
    private $actionName;

    /** @var string */
    private $path;

    /** @var string */
    private $method;

    /**
     * @param string $controllerClassname
     * @param string $actionName
     * @return Route
     */
    public static function constructWithControllerAndActionName($controllerClassname, $actionName)
    {
        $route = new Route();
        $route->setControllerClassname($controllerClassname);
        $route->setActionName($actionName);
        return $route;
    }

    /**
     * @param string $path
     * @return Route
     */
    public static function constructWithPath($path)
    {
        $route = new Route();
        $route->path = $path;
        return $route;
    }

    /**
     * @param string[] $arrayToConstructFrom
     * @return Route
     */
    public static function constructFromArray($arrayToConstructFrom)
    {
        $route = new Route();

        $route->controllerClassname = $arrayToConstructFrom['controller_classname'];
        $route->actionName          = $arrayToConstructFrom['action_name'];
        $route->method              = $arrayToConstructFrom['method'];
        $route->path                = $arrayToConstructFrom['path'];

        return $route;
    }

    /**
     * @return string
     */
    public function getControllerClassname()
    {
        return $this->controllerClassname;
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param string $controllerClassname
     */
    private function setControllerClassname($controllerClassname)
    {
        $this->controllerClassname = $controllerClassname;
    }

    /**
     * @param string $actionName
     */
    private function setActionName($actionName)
    {
        $this->actionName = $actionName;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return bool
     */
    public function matchesPath($path)
    {
        return $path === $this->path;
    }
}
