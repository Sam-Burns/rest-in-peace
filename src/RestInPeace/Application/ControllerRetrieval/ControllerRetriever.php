<?php
namespace RestInPeace\Application\ControllerRetrieval;

interface ControllerRetriever
{
    /**
     * @param string $name
     * @return object
     */
    public function getController($name);
}
