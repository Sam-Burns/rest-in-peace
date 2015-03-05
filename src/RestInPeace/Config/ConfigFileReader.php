<?php
namespace RestInPeace\Config;

class ConfigFileReader
{
    /**
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        return require $path;
    }
}
