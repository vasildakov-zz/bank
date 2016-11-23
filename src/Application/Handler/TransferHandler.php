<?php
declare(strict_types = 1);

namespace Application\Handler;

use Domain\ValueObject\Money;
use Domain\Command\MakeTransferCommand;

use Psr\Log\LoggerInterface;

/**
 * Class TransferHandler
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TransferHandler
{
    /**
     * @var AccountRepositoryInterface
     */
    private $accounts;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param AccountRepositoryInterface $accounts
     */
    public function __construct(AccountRepositoryInterface $accounts, LoggerInterface $logger)
    {
        $this->accounts = $accounts;
        $this->logger   = $logger;
    }


    /**
     * @param  MakeTransferCommand $command
     * @return
     */
    public function __invoke(MakeTransferCommand $command)
    {
        $source = $this->accounts->find($command->source());
        $destination = $this->accounts->find($command->destination());

        $money = new Money($command->amount());

        $source->withdraw($money);
        $destination->deposit($money);

        $this->logger->info('Transfer from %s to %s');
    }
}
