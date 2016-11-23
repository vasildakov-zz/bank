<?php

declare(strict_types = 1);

namespace Domain\Command;

/**
 * Class CreateCustomerCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateCustomerCommand implements Command
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
     * @var string
     */
    private $password;

    /**
     * @param string  $id
     * @param string  $email
     */
    public function __construct(string $id, string $email, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
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

    /**
     * @return string
     */
    public function password() : string
    {
        return $this->password;
    }
}
