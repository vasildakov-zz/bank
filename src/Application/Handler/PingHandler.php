<?php
declare(strict_types = 1);

namespace Application\Handler;

use Domain\Command\PingCommand;
use Psr\Log\LoggerInterface;

/**
 * Class PingHandler
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;


    /**
     * @param LoggerInterface $accounts
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @param  Domain\Command\PingCommand $command
     * @return
     */
    public function __invoke(PingCommand $command)
    {
        $commandTime = $command->getCommandTime();
        $this->logger->info(sprintf('Ping %s', $commandTime));
    }
}
