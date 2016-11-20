<?php namespace Domain\Entity {

    use Domain\ValueObject\Uuid;

    class Customer implements CustomerInterface
    {
        /**
         * @var ValueObject\Uuid
         */
        private $id;

        /**
         * @var array
         */
        private $accounts = [];

        /**
         * @var array
         */
        private $transactions = [];


        public function __construct(Uuid $id)
        {
            //
        }
    }
}
