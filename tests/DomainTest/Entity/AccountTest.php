<?php
namespace DomainTest\Entity;

use Domain\Entity\Account;
use Domain\Entity\Customer;
use Domain\ValueObject\Uuid;

class AccountTest extends \PHPUnit_Framework_TestCase
{
    private $id;

    private $customer;

    protected function setUp()
    {
        $this->id = $this->prophesize(Uuid::class)->reveal();
        $this->customer = $this->prophesize(Customer::class)->reveal();
    }

    public function testObjectCanBeConstructedWithValidArguments()
    {
        $account = new Account($this->id, $this->customer);

        self::assertInstanceOf(Account::class, $account);
    }
}
