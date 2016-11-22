<?php

declare(strict_types = 1);

namespace Domain\ValueObject;

class Money
{
    private $amount;

    private $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
    }
}
