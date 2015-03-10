<?php

return array(

    'rest-in-peace' => array(

        'routes' => array(

            'hello-world' => array(
                'controller_classname' => '\RestInPeace\SampleApp\Controller\HelloWorldController',
                'action_name'          => 'helloWorldAction',
                'method'               => 'GET',
                'path'                 => '/hello-world/'
            ),

//            'di-controller-test' => array(
//                'controller_serviceid' => 'di-only-controller',
//                'action_name'          => 'anAction',
//                'method'               => 'GET',
//                'path'                 => '/controllers-as-a-service/'
//            ),

        )

    )

);
