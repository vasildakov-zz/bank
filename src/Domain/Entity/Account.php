<?php namespace Domain\Entity {

    use Domain\ValueObject\Uuid;

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


        public function __construct()
        {
            //
        }


        public function deposit($amount)
        {
            $this->transactions->add($amount);
        }


        public function withdraw($amount)
        {
            $this->transactions->add($amount);
        }
    }
}
