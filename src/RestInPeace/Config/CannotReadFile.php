<?php
namespace RestInPeace\Config;

class CannotReadFile extends \RuntimeException
{
    /**
     * @param string $path
     * @return static
     */
    public static function constructFromPath($path)
    {
        $exception = new static();
        $exception->message = "File not readable: '$path'";
        return $exception;
    }
}
