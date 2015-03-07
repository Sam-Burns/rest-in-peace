<?php
namespace RestInPeace\Application\ControllerRetrieval;

class DirectInstantiationControllerRetriever implements ControllerRetriever
{
    /**
     * @param string $name
     * @return obejct
     */
    public function getController($name)
    {
        return new $name;
    }
}
