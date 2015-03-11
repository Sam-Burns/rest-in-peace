<?php

return array(

    'dirty-needle' => array(

        'rest-in-peace.frontcontroller' => array(
            'class' => '\RestInPeace\Application\FrontController',
            'arguments' => array(
                'rest-in-peace.routemanager',
                'rest-in-peace.requestfromsuperglobalsbuilder',
                'rest-in-peace.controllerretriever'
            )
        ),

        'rest-in-peace.requestfromsuperglobalsbuilder' => array(
            'class' => 'RestInPeace\Request\RequestFromSuperglobalsBuilder',
        ),

        'rest-in-peace.controllerretriever' => array(
            'class' => '\RestInPeace\Application\ControllerRetrieval\DirtyNeedleControllerRetriever'
        ),

        'rest-in-peace.routemanager' => array(
            'class' => 'RestInPeace\Routing\RouteManager',
            'arguments' => array(
                'rest-in-peace.routebuilder'
            )
        ),

        'rest-in-peace.routebuilder' => array(
            'class' => 'RestInPeace\Routing\RouteBuilder',
            'arguments' => array(
                'rest-in-peace.configfilereader'
            )
        ),

        'rest-in-peace.configfilereader' => array(
            'class' => 'RestInPeace\Config\ConfigFileReader'
        ),

        'rest-in-peace.responsedispatcher' => array(
            'class' => '\RestInPeace\Application\ResponseDispatcher'
        ),

    ),

);
