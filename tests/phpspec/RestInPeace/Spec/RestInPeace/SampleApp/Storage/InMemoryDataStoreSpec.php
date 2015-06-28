<?php

namespace RestInPeace\Spec\RestInPeace\SampleApp\Storage;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryDataStoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\SampleApp\Storage\InMemoryDataStore');
    }

    function it_can_add_resources_and_retrieve_them()
    {
        $resourceType = 'person';
        $resourceId = 123;
        $resourceBody = '{"name": "Eminem"}';

        $this->addResource($resourceType, $resourceId, $resourceBody);

        $this->getResource($resourceType, $resourceId)->shouldReturn($resourceBody);
    }
}
