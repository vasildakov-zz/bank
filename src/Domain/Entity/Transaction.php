<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;

/**
 * Class Transaction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Transaction implements TransactionInterface
{
    const TYPE_CREDIT = 1;

    const TYPE_DEBIT  = 2;


    const STATUS_PENDING   = 1;

    const STATUS_APPROVED  = 2;

    /**
     * @var ValueObject\Uuid
     */
    private $id;

    /**
     * @var int
     */
    private $type;

    /**
     * @var Entity\Account
     */
    private $account;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var ValueObject\DateTime
     */
    private $createdAt;


    private $status;


    public function __construct(Uuid $id, Account $account, Money $amount, $type)
    {
        $this->id = $id;
        $this->createdAt = new \DateTime();
    }


    // immutables
    // public function setType() {}
    // public function setCreatedAt() {}
    // public function setAccount() {}
}

// new Transaction($id, $account, $type, $amount);
