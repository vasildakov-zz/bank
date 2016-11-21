<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    /**
     * @dataProvider uuid1Provider
     */
    public function testObjectCanBeConstructedWithValidUuid1($uuid, $expected)
    {
        self::assertInstanceOf(Uuid::class, new Uuid($uuid));
    }


    /**
     * @dataProvider uuid4Provider
     */
    public function testObjectCanBeConstructedWithValidUuid4($uuid, $expected)
    {
        self::assertInstanceOf(Uuid::class, new Uuid($uuid));
    }


    /**
     * @return array An array with valid UUID's Version 1
     */
    public function uuid1Provider()
    {
        return [
            ['a8163e7a-afdc-11e6-80f5-76304dec7eb7', true],
            ['a816441a-afdc-11e6-80f5-76304dec7eb7', true],
            ['a8164636-afdc-11e6-80f5-76304dec7eb7', true],
            ['a81647e4-afdc-11e6-80f5-76304dec7eb7', true],
            ['a81649c4-afdc-11e6-80f5-76304dec7eb7', true],
        ];
    }


    /**
     * @return array An array with valid UUID's Version 4
     */
    public function uuid4Provider()
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
