<?php
namespace DomainTest\Entity;

use Domain\Entity\Customer;
use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Domain\ValueObject\Uuid
     */
    private $id;

    /**
     * @var Domain\ValueObject\Email
     */
    private $email;

    protected function setUp()
    {
        $this->id = $this->prophesize(Uuid::class)->reveal();
        $this->email = $this->prophesize(Email::class)->reveal();
    }

    public function testObjectCanBeConstructedWithValidArguments()
    {
        $customer = new Customer($this->id, $this->email);

        self::assertInstanceOf(Customer::class, $customer);
    }
}
