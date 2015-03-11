<?php
namespace RestInPeaceSpec\RestInPeace\Routing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Config\ConfigFileReader;
use RestInPeace\Routing\Route;

class RouteBuilderSpec extends ObjectBehavior
{
    function let(ConfigFileReader $configFileReader)
    {
        $this->beConstructedWith($configFileReader);
    }

    function it_can_be_configured_from_a_file(ConfigFileReader $configFileReader)
    {
        $configArray = array(
            'rest-in-peace' => array(
                'routes' => array(
                    'hello-world' => array(
                        'path'                 => '/hello-world/',
                        'method'               => 'get',
                        'controller_serviceid' => 'controller-service-id',
                        'action_name'          => 'helloWorldAction'
                    )
                )
            )
        );

        $configFileReader->read('file_path')->willReturn($configArray);

        $this->addConfigFile('file_path');

        $this->getRoutes()->shouldBeLike(
            array(
                Route::constructFromArray($configArray['rest-in-peace']['routes']['hello-world'])
            )
        );
    }
}
