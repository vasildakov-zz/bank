<?php

namespace Application\Handler;

use Interop\Container\ContainerInterface;
use Infrastructure\Repository\Memory\CustomerRepository;

class TransferHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return TransferHandler
     */
    public function __invoke(ContainerInterface $container)
    {
        $accounts = $container->get(CustomerRepository::class);

        return new TransferHandler($accounts, $transactions);
    }
}
