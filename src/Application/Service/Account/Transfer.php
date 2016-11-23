<?php
declare(strict_types = 1);

namespace Application\Service\Account;

use Domain\Repository\AccountRepositoryInterface;
use Domain\ValueObject\Money;

/**
 * Class Transfer
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Transfer implements TransferInterface
{
    /**
     * @var \Domain\Repository\AccountRepositoryInterface
     */
    private $accounts;


    /**
     * @param AccountRepositoryInterface $accounts [description]
     */
    public function __construct(AccountRepositoryInterface $accounts)
    {
        $this->accounts = $accounts;
    }


    /**
     * @param  TransferRequest   $request
     * @return TransferResponse
     */
    public function __invoke(TransferRequest $request) : TransferResponse
    {
        $source      = $this->accounts->find($request->source());
        $destination = $this->accounts->find($request->destination());
        $money       = new Money($request->amount());

        $source->withdraw($money);
        $destination->deposit($money);

        return new TransferResponse();
    }
}
