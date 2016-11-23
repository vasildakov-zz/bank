<?php

declare(strict_types = 1);

namespace Domain\Command;

/**
 * Class CreateCustomerCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CreateCustomerCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $email;


    /**
     * @param string  $id
     * @param string  $email
     */
    public function __construct(string $id, string $email)
    {
        $this->id    = $id;
        $this->email = $email;
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
    public function email() : string
    {
        return $this->email;
    }
}
