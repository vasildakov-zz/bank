<?php

declare(strict_types = 1);

namespace Domain\Command;

/**
 * Class CreateAccountCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateAccountCommand implements Command
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $customer;

    /**
     * @param string  $id
     * @param string  $customer
     */
    public function __construct(string $id, string $customer)
    {
        $this->id = $id;
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function id() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function customer() : string
    {
        return $this->customer;
    }
}
