<?php

namespace Domain\Repository;

use Domain\Entity\Customer;
use Domain\ValueObject\Email;

/**
 * CustomerRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface CustomerRepositoryInterface
{
    public function remove(Customer $customer);

    public function persist(Customer $customer);

    public function findOneByEmail(Email $email);
}
