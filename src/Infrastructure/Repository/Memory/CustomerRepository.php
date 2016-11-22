<?php

declare(strict_types = 1);

namespace Infrastructure\Repository\Memory;

use Domain\ValueObject\Email;
use Domain\Entity\Customer;
use Domain\Repository\CustomerRepositoryInterface;

/**
 * InMemory CustomerRepository
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var array
     */
    private $data;


    public function __construct()
    {
        $this->data = [];
    }

    /**
     * Removes customer from the collection
     *
     * @param  Customer $customer
     * @return void
     */
    public function remove(Customer $customer)
    {
        $key = (string)$customer->getId();
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        }
    }

    /**
     * Persists customer to the collection
     *
     * @param  Customer $customer
     * @return void
     */
    public function persist(Customer $customer)
    {
        $key = (string)$customer->getId();

        if (isset($this->data[$key])) {
            throw new \Exception("Customer with ID $key is already exist.");
        }

        $this->data[$key] = $customer;
    }


    public function count()
    {
        return count($this->data);
    }

    /**
     * @return Customer[]
     */
    public function findAll()
    {
        return $this->data;
    }

    /**
     * @param  Email  $email
     * @return Customer|null
     */
    public function findOneByEmail(Email $email)
    {
        foreach ($this->data as $customer) {
            if ($customer->email()->equals($email)) {
                return $customer;
            }
        }
        return null;

        /* $key = array_search($email, array_column($array, 'email'));
        return ($key) ? $this->data[$key] : null; */
    }
}
