<?php

namespace Application\Handler;

use Interop\Container\ContainerInterface;
use Monolog\Logger;

/**
 * Class PingHandlerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = $container->get(Logger::class);

        return new PingHandler($logger);
    }
}
