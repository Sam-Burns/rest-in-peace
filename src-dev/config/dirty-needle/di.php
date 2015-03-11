<?php

return array(

    'dirty-needle' => array(

        'hello-world-controller' => array(
            'class' => '\RestInPeace\SampleApp\Controller\HelloWorldController'
        ),

        'di-only-controller' => array(
            'class' => 'RestInPeace\SampleApp\Controller\DiOnlyController',
            'arguments' => array(
                'dependency-of-controller'
            )
        ),

        'dependency-of-controller' => array(
            'class' => '\RestInPeace\SampleApp\Domain\DependencyOfController'
        )

    )

);
