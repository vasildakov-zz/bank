<?php namespace Domain\ValueObject {

    class Uuid
    {
        private $value;

        public function __construct($value)
        {
            $this->value = $value;
        }
    }
}
