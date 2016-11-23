<?php
declare(strict_types = 1);

namespace Infrastructure\Ui\Api;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

/**
 * Class TransferActionFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingActionFactory
{
    /**
     * @param  ContainerInterface $container
     * @return TransferAction
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new TransferAction($bus);
    }
}
