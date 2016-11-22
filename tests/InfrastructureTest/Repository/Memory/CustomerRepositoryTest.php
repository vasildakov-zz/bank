<?php
namespace DomainTest\ValueObject;

use Faker\Provider;
use Faker;

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

        $this->provider = Faker\Factory::create();
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
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $customer2 = new Customer(
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $repository->persist($customer1);
        $repository->persist($customer2);

        self::assertEquals(2, $repository->count());
    }


    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /Customer with ID \w+/
     */
    public function testPersistThrowsAnException()
    {
        $repository = new CustomerRepository;

        self::assertEquals(0, $repository->count());

        $customer = new Customer(
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $repository->persist($customer);
        $repository->persist($customer);
    }


    public function testFindOneByEmailCanReturnObject()
    {
        $customer = new Customer(
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $repository = new CustomerRepository;
        $repository->persist($customer);

        $result = $repository->findOneByEmail($customer->email());

        self::assertInstanceOf(Customer::class, $result);
        self::assertEquals($customer, $result);
    }


    public function testFindOneByEmailCanReturnNull()
    {
        $repository = new CustomerRepository;

        self::assertNull(
            $repository->findOneByEmail(
                new Email($this->provider->email())
            )
        );
    }


    public function testFindCanReturnObject()
    {
        $customer = new Customer(
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $repository = new CustomerRepository;
        $repository->persist($customer);

        $result = $repository->find($customer->id());

        self::assertInstanceOf(Customer::class, $result);
        self::assertEquals($customer, $result);
    }


    public function testFindCanReturnNull()
    {
        $repository = new CustomerRepository;

        self::assertNull(
            $repository->find(
                new Uuid($this->provider->uuid())
            )
        );
    }


    public function testCanRemoveObject()
    {
        $customer = new Customer(
            new Uuid($this->provider->uuid()),
            new Email($this->provider->email())
        );

        $repository = new CustomerRepository;
        $repository->persist($customer);

        self::assertEquals(1, $repository->count());

        $repository->remove($customer);

        self::assertEquals(0, $repository->count());
    }


    public function testFindAllReturnAnArray()
    {
        $repository = new CustomerRepository;
        self::assertInternalType('array', $repository->findAll());
    }
}
