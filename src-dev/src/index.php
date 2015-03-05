<?php

require __DIR__ . '/bootstrap.php';

$application = new \RestInPeace\Application();
$responseBody = $application->visit('');
echo $responseBody->getBody();
