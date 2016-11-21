<?php namespace Domain\ValueObject {

    class Uuid
    {
        /**
         * Matches Uuid's versions 1 to 5.
         */
        const REGEX_UUID = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';

        /**
         * @var string
         */
        private $value;

        /**
         * @param string $value
         */
        public function __construct($value)
        {
            if (!is_string($value)) {
                throw new \InvalidArgumentException;
            }

            if (!\preg_match(self::REGEX_UUID, $value)) {
                throw new \InvalidArgumentException;
            }

            $this->value = $value;
        }
    }
}
