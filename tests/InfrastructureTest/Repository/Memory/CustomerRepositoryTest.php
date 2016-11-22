<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\Entity\Customer;
use Domain\Repository\CustomerRepositoryInterface;
use Infrastructure\Repository\Memory\CustomerRepository;

class CustomerRepositoryTest extends \PHPUnit_Framework_TestCase
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
        $this->id    = $this->prophesize(Uuid::class)->reveal();
        $this->email = $this->prophesize(Email::class)->reveal();
    }


    public function testObjectCanBeConstructed()
    {
        $repository = new CustomerRepository;

        self::assertInstanceOf(CustomerRepositoryInterface::class, $repository);
    }


    public function testObjectCanBePersisted()
    {
        $repository = new CustomerRepository;

        self::assertEquals(0, $repository->count());

        $customer1 = new Customer(
            new Uuid('3d1ff8e9-1b07-4685-bc44-740d696faed3'),
            new Email('vasildakov@gmail.com')
        );

        $customer2 = new Customer(
            new Uuid('ed8a48c6-a38a-47fd-a8eb-d9738308b488'),
            new Email('john.doe@gmail.com')
        );

        $repository->persist($customer1);
        $repository->persist($customer2);

        self::assertEquals(2, $repository->count());
    }


    public function testFindOneByEmailReturnsObject()
    {
        $customer = new Customer(
            new Uuid('ed8a48c6-a38a-47fd-a8eb-d9738308b488'),
            new Email('john.doe@gmail.com')
        );

        $repository = new CustomerRepository;
        $repository->persist($customer);

        $result = $repository->findOneByEmail($customer->email());

        self::assertInstanceOf(Customer::class, $result);
        self::assertEquals($customer, $result);
    }


    public function testFindReturnsObject()
    {
        $customer = new Customer(
            new Uuid('ed8a48c6-a38a-47fd-a8eb-d9738308b488'),
            new Email('john.doe@gmail.com')
        );

        $repository = new CustomerRepository;
        $repository->persist($customer);

        $result = $repository->find($customer->id());

        self::assertInstanceOf(Customer::class, $result);
        self::assertEquals($customer, $result);
    }
}
