<?php

namespace LikeAJohny\ValueObjectsTest;

use PHPUnit\Framework\TestCase;
use LikeAJohny\ValueObjects\StringValue;

class StringValueTest extends TestCase
{
    public function testLeavesInitialStringValueUntouched(): void
    {
        $initialString = 'Initial String';
        $stringValue = $this->stringValue($initialString);

        $this->assertEquals($initialString, $stringValue->toString());
    }

    public function testDetectsEqualStringValues(): void
    {
        $stringValue = $this->stringValue('string');
        $equalStringValue = $this->stringValue('string');

        $this->assertTrue($stringValue->equals($equalStringValue));
    }

    public function testDetectsDifferingStringValues(): void
    {
        $stringValue = $this->stringValue('string');
        $differingStringValue = $this->stringValue('String');

        $this->assertFalse($stringValue->equals($differingStringValue));
    }

    public function testDeterminesItsLength(): void
    {
        $stringValue = $this->stringValue('I am 24 characters long.');

        $this->assertEquals(24, $stringValue->length());
    }

    public function testDeterminesEmptiness(): void
    {
        $stringValue = $this->stringValue('');

        $this->assertTrue($stringValue->empty());
    }

    private function stringValue(string $value): StringValue
    {
        return $this->getMockForAbstractClass(StringValue::class, [$value]);
    }
}
