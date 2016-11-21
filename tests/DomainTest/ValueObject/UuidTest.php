<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    /**
     * @dataProvider identityProvider
     */
    public function testObjectCanBeConstructedWithValidArguments($uuid, $expected)
    {
        self::assertInstanceOf(Uuid::class, new Uuid($uuid));
    }

    public function identityProvider()
    {
        return [
            ['ce317f26-665c-4b34-9394-d700a08d4ede', true],
            ['bd8863d4-77f9-4813-a8da-03cc4dee54c3', true],
            ['45de2ab0-cf85-49ee-8912-631d7d329568', true],
            ['9314e47b-f665-4e12-bcdf-f34fdea1ab5a', true],
            ['698e502f-69c7-4adc-b16f-cec40657a470', true],
        ];
    }
}
