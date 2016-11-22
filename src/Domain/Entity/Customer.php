<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

/**
 * Class Customer
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Customer implements CustomerInterface
{
    /**
     * @var ValueObject\Uuid
     */
    private $id;

    /**
     * @var ValueObject\Email
     */
    private $email;

    /**
     * @var array
     */
    private $accounts = [];

    /**
     * @var array
     */
    private $transactions = [];

    /**
     * @var ValueObject\DateTime
     */
    private $createdAt;
    

    public function __construct(Uuid $id, Email $email)
    {
        $this->id = $id;

        $this->email = $email;

        $this->createdAt = new \DateTime();
    }


    public function getId()
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }
}
