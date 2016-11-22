<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }


    public function testObjectCanBeConstructedWithValidArgument()
    {
        $email = new Email('vasildakov@gmail.com');
        
        self::assertInstanceOf(Email::class, $email);
    }
}
