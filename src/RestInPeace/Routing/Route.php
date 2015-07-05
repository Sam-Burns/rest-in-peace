<?php
namespace RestInPeace\Routing;

class Route
{
    /** @var string */
    private $name;

    /** @var string */
    private $path;

    /** @var string */
    private $httpMethod;

    /** @var string */
    private $controllerServiceId;

    /** @var string */
    private $actionMethodName;

    /**
     * @param string $name
     * @param string $path
     * @param string $httpMethod
     * @param string $controllerServiceId
     * @param string $actionMethodName
     */
    public function __construct($name, $path, $httpMethod, $controllerServiceId, $actionMethodName)
    {
        $this->controllerServiceId = $controllerServiceId;
        $this->actionMethodName = $actionMethodName;
    }

    /**
     * @return string
     */
    public function getControllerServiceId()
    {
        return $this->controllerServiceId;
    }

    /**
     * @return string
     */
    public function getActionMethodName()
    {
        return $this->actionMethodName;
    }
}
