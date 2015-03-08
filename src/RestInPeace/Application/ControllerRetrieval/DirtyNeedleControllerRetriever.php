<?php
namespace RestInPeace\Application\ControllerRetrieval;

use DirtyNeedle\DiContainer;

class DirtyNeedleControllerRetriever implements ControllerRetriever
{
    /**
     * @param string $controllerServiceId
     * @return object
     */
    public function getController($controllerServiceId)
    {
        return DiContainer::getInstance()->get($controllerServiceId);
    }
}
