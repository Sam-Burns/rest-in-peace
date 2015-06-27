<?php

namespace RestInPeace\Response;

class StatusCode
{
    /** @var int */
    private $statusCodeInt;

    /**
     * @param int $statusCodeInt
     */
    public function __construct($statusCodeInt)
    {
        $this->statusCodeInt = (int)$statusCodeInt;
    }

    /**
     * @param StatusCode $another
     * @return bool
     */
    public function equals(StatusCode $another)
    {
        return $this->statusCodeInt === $another->getAsInt();
    }

    /**
     * @return int
     */
    public function getAsInt()
    {
        return $this->statusCodeInt;
    }
}
