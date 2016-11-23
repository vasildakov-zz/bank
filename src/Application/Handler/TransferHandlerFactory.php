<?php

namespace Application\Handler;

use Interop\Container\ContainerInterface;
use Infrastructure\Repository\Memory\CustomerRepository;
use Monolog\Logger;

/**
 * Class TransferHandlerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TransferHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return TransferHandler
     */
    public function __invoke(ContainerInterface $container)
    {
        $accounts = $container->get(CustomerRepository::class);
        $logger   = $container->get(Logger::class);

        return new TransferHandler($accounts, $logger);
    }
}
