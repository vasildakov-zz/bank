<?php

declare(strict_types = 1);

namespace Domain\ValueObject;

class Email implements \JsonSerializable
{
    private $value;

    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid email', $value));
        }

        $this->value = $value;
    }

    public function equals(Email $other)
    {
        return strtolower((string) $this) === strtolower((string) $other);
    }

    public function __toString()
    {
        return (string) $this->value;
    }
    
    public function jsonSerialize()
    {

    }
}
