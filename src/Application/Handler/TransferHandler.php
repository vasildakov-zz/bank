<?php
declare(strict_types = 1);

namespace Application\Handler;

use Domain\Command\TransferCommand;

class TransferHandler
{
    /**
     * @param AccountRepositoryInterface $accounts
     */
    public function __construct(AccountRepositoryInterface $accounts)
    {
        $this->accounts = $accounts;
    }

    public function __invoke(TransferCommand $command)
    {
        $source      = $command->source();
        $destination = $command->destination();
        $amount      = $command->amount();
    }
}
