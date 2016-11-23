<?php
declare(strict_types = 1);

namespace Application\Cli;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

/**
 * Class TransferCommandFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TransferCommandFactory
{
    /**
     * @param  ContainerInterface $container
     * @return TransferCommand
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new TransferCommand($bus);
    }
}
