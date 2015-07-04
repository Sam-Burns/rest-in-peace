<?php
return array(

    'rest-in-peace' => array(

        'routing' => array(

            'index' => array(
                'route'                 => '/',
                'method'                => 'GET',
                'controller-service-id' => 'controllers.index',
                'action-method-name'    => 'indexAction',
            ),

        )

    )

);
