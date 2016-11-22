<?php
namespace Application\Service\Transfer;

use Domain\Repository\AccountRepositoryInterface;
use Domain\ValueObject\Money;

interface TransferInterface
{
    /**
     * @param  TransferRequest
     * @return TransferResponse
     * @throws Exception
     */
    public function __invoke(TransferRequest $request) : TransferResponse;
}
