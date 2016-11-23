<?php

namespace Domain\Command;

class PingCommand
{
    private $commandTime;

    public function __construct()
    {
        $this->commandTime = time();
    }

    public function getCommandTime()
    {
        return $this->commandTime;
    }
}
