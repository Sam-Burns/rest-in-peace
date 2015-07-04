<?php
namespace RestInPeace\Routing;

class Route
{
    /** @var string */
    private $name;

    /** @var array */
    private $config;

    /**
     * @param string $name
     * @param array  $config
     */
    public function __construct($name, $config)
    {
        $this->name = $name;
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getControllerServiceId()
    {
        return $this->config['controller-service-id'];
    }

    /**
     * @return string
     */
    public function getActionMethodName()
    {
        return $this->config['action-method-name'];
    }
}
