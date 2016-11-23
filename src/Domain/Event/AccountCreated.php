<?php
declare(strict_types = 1);

namespace Domain\Event;

/**
 * Class AccountCreated
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class AccountCreated
{

    public function __construct(Account $account)
    {
        $this->account = $account;
    }
}
