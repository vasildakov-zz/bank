<?php
namespace Domain\Factory;

use Domain\Entity\Customer;

/**
 * Interface CustomerFactoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface CustomerFactoryInterface
{
    public function __invoke() : Customer;

}
