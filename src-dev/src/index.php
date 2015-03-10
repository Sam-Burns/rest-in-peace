<?php

require __DIR__ . '/bootstrap.php';

$diContainer = DirtyNeedle\DiContainer::getInstance();
$diContainer->addConfigFile(__DIR__ . '/../config/di.php');

$application = new \RestInPeace\Application();
$application->configureFromFolder('/src-dev/config/');
$application->run();
