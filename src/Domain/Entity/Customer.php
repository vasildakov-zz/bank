<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\Adapter\ArrayCollection;

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
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

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

    /**
     * @param Uuid  $id
     * @param Email $email
     */
    public function __construct(Uuid $id, Email $email)
    {
        $this->id = $id;
        $this->email = $email;

        $this->accounts = new ArrayCollection();
        $this->transactions = new ArrayCollection();

        $this->createdAt = new \DateTime();
    }

    /**
     * @return Uuid $id
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return Email $email
     */
    public function email()
    {
        return $this->email;
    }
}
