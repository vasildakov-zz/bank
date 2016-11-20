<?php namespace Domain\Entity {

    use Domain\ValueObject\Uuid;
    use Domain\ValueObject\Money;
    use Domain\ValueObject\Currency;

    class Account implements AccountInterface
    {
        /**
         * @var ValueObject\Uuid
         */
        private $id;

        /**
         * @var float
         */
        private $balance;

        /**
         * @var Entity\Customer
         */
        private $customer;

        /**
         * @var Entity\Transaction
         */
        private $transactions;

        /**
         * @var ValueObject\Currency
         */
        private $currency;

        /**
         * @var ValueObject\DateTime
         */
        private $createdAt;


        public function __construct(Uuid $id)
        {
            $this->id = $id;

            $this->createdAt = new \DateTime();
        }


        // private
        private function addTransaction(Transaction $transaction)
        {
            $this->transactions->add($transaction);
        }


        // public api
        public function deposit($amount)
        {
            $this->addTransaction(
                new Transaction(
                    new Money($amount),
                    Transaction::TYPE_CREDIT
                )
            );
        }


        // public api
        public function withdraw($amount)
        {
            $this->addTransaction(
                new Transaction(
                    new Money($amount),
                    Transaction::TYPE_DEBIT
                )
            );
        }
    }
}
