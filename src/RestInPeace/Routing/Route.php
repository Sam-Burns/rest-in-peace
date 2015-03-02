<?php

namespace RestInPeace\Routing;

class Route
{
    /** @var string */
    private $controllerClassname;

    /** @var string */
    private $actionName;

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
}
