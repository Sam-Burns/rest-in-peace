<?php

namespace RestInPeace\SampleApp\Storage;

class InMemoryDataStore
{
    /** @var array */
    private $resources = [];

    /**
     * @param string $resourceType
     * @param int    $id
     * @param string $resourceBody
     */
    public function addResource($resourceType, $id, $resourceBody)
    {
        if (!isset($this->resources[$resourceType])) {
            $this->resources[$resourceType] = [];
        }
        $this->resources[$resourceType][$id] = $resourceBody;
    }

    /**
     * @param $resourceType
     * @param $id
     * @return string|null
     */
    public function getResource($resourceType, $id)
    {
        if (isset($this->resources[$resourceType]) && isset($this->resources[$resourceType][$id])) {
            return $this->resources[$resourceType][$id];
        }
        return null;
    }
}
