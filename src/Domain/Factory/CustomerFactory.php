<?php

declare(strict_types = 1);

namespace Domain\Factory;

use Domain\Entity\Customer;
use Domain\Service\IdentityGeneratorInterface;

/**
 * Class CustomerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CustomerFactory implements CustomerFactoryInterface
{
    /**
     * @param IdentityGeneratorInterface $generator
     */
    public function __construct(IdentityGeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return Customer
     */
    public function __invoke() : Customer
    {
        $uuid = ($this->generator)();

        return new Customer($uuid);
    }
}
