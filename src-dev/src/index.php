<?php

require __DIR__ . '/bootstrap.php';

$application = new \RestInPeace\Application();
$application->configureFromFolder('/src-dev/config/');
$application->run();
