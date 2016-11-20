<?php namespace Domain\ValueObject {

    class Money
    {
        private $amount;

        private $currency;

        public function __construct($amount, $currency)
        {
            $this->amount = $amount;
        }
    }
}
