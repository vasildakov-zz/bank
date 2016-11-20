<?php namespace Domain\Entity {

    use Domain\ValueObject\Uuid;

    class Transaction implements TransactionInterface
    {
        const TYPE_CREDIT = 1;

        const TYPE_DEBIT  = 2;

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


        public function __construct(Uuid $id)
        {
            $this->createdAt = new \DateTime();
        }


        // immutables
        // public function setType() {}
        // public function setCreatedAt() {}
        // public function setAccount() {}
    }
}

// new Transaction($id, $account, $type, $amount);
