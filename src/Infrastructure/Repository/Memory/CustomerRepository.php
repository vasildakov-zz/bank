<?php

declare(strict_types = 1);

namespace Infrastructure\Repository\Memory;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\Entity\Customer;
use Domain\Repository\CustomerRepositoryInterface;

/**
 * InMemory CustomerRepository
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CustomerRepository extends AbstractMemoryRepository implements CustomerRepositoryInterface
{

    public function find(Uuid $id)
    {
        foreach ($this->items as $customer) {
            if ($customer->id()->equals($id)) {
                return $customer;
            }
        }
        return null;
    }


    /**
     * Removes customer from the collection
     *
     * @param  Customer $customer
     * @return void
     */
    public function remove(Customer $customer)
    {
        $key = (string)$customer->id();
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
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
        $key = (string)$customer->id();

        if (isset($this->items[$key])) {
            throw new \Exception("Customer with ID $key is already exist.");
        }

        $this->items[$key] = $customer;
    }


    /**
     * @return Customer[]
     */
    public function findAll()
    {
        return $this->items;
    }

    /**
     * @param  Email  $email
     * @return Customer|null
     */
    public function findOneByEmail(Email $email)
    {
        foreach ($this->items as $customer) {
            if ($customer->email()->equals($email)) {
                return $customer;
            }
        }
        return null;

        /*
        $key = array_search($email, array_column($array, 'email'));
        return ($key) ? $this->items[$key] : null; */
    }
}
