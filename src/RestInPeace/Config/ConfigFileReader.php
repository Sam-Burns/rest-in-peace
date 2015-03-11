<?php
namespace RestInPeace\Config;

class ConfigFileReader
{
    /**
     * @throws CannotReadFile
     *
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        if (!is_readable($path)) {
            $exception = CannotReadFile::constructFromPath($path);
            throw $exception;
        }
        return require $path;
    }
}
