<?php
declare(strict_types = 1);

namespace Domain\Factory;

use Domain\Entity\Customer;
use Domain\ValueObject\Money;
use Domain\Repository\AccountRespository;

/**
 * Class MakeTransferHandler
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class MakeTransferHandler
{
    /**
     * @param AccountRespository $accounts
     */
    public function __construct(AccountRespository $accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @return MakeTransferCommand
     */
    public function __invoke(MakeTransferCommand $command)
    {
        $source = $this->accounts->find($command->source());
        $destination = $this->accounts->find($command->destination());
        $money = new Money($command->amount());

        $source->withdraw($money);
        $destination->deposit($money);
    }
}
