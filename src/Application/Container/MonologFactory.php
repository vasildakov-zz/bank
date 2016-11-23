<?php
declare(strict_types = 1);

namespace Application\Container;

use Interop\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class MonologFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MonologFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Logger
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler('./data/log/application.log', Logger::INFO));

        return $logger;
    }
}
