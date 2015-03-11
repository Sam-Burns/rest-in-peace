<?php

require __DIR__ . '/../bootstrap.php';

$diContainer = DirtyNeedle\DiContainer::getInstance();
$diContainer->addConfigFile(APPLICATION_ROOT_DIR . '/config/dirty-needle/di.php');

$application = new \RestInPeace\Application();
$application->configureFromFiles([APPLICATION_ROOT_DIR . '/config/rest-in-peace/routing.php']);
$application->run();
