<?php
declare(strict_types = 1);

namespace Domain\Command;

/**
 * Class PingCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingCommand
{
    private $time;

    public function __construct()
    {
        $this->time = time();
    }

    public function time()
    {
        return $this->time;
    }
}
