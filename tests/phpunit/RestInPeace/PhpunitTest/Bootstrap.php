<?php
namespace RestInPeace\PhpunitTest;

class Bootstrap
{
    public function init()
    {
        define('APPLICATION_ROOT_DIR', __DIR__ . '/../../../../');
        include_once APPLICATION_ROOT_DIR . 'vendor/autoload.php';

    }
}
