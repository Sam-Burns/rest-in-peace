<?php

define('APPLICATION_ROOT_DIR', dirname(__DIR__));
require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

$diContainer = \DirtyNeedle\DiContainer::getInstance();
$diContainer->addConfigFile(APPLICATION_ROOT_DIR . '/config/di/misc.php');
