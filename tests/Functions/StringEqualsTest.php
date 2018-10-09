<?php

namespace Improved\Tests\Functions;

use Improved as i;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Improved\string_equals
 */
class StringEqualsTest extends TestCase
{
    public function caseSensitiveProvider()
    {
        return [
            ["abcdef", "abcdef", true],
            ["abcdef", "bar", false],
            ["abcdef", "ábcdëf", false],
            ["abcdef", "AbCdEf", false],
            ["áëß", "áëß", true]
        ];
    }

    /**
     * @dataProvider caseSensitiveProvider
     */
    public function testMultibyte(string $left, string $right, int $expected)
    {
        $this->assertEquals($expected, i\string_equals($left, $right));
    }

    /**
     * @dataProvider caseSensitiveProvider
     */
    public function testBinary(string $left, string $right, int $expected)
    {
        $this->assertEquals($expected, i\string_equals($left, $right, i\STRING_BINARY));
    }


    public function caseInsensitiveProvider()
    {
        return [
            ["abcdef", "abcdef", true, true],
            ["abcdef", "bar", false, false],
            ["abcdef", "AbCdEf", true, true],
            ["áëß", "ÁËẞ", true, false]
        ];
    }

    /**
     * @dataProvider caseInsensitiveProvider
     */
    public function testMultibyteCaseInsensitive(string $left, string $right, int $expected)
    {
        $this->assertEquals($expected, i\string_equals($left, $right, i\STRING_CASE_INSENSITIVE));
    }

    /**
     * @dataProvider caseInsensitiveProvider
     */
    public function testBinaryCaseInsensitive(string $left, string $right, $_, int $expected)
    {
        $this->assertEquals($expected, i\string_equals($left, $right, i\STRING_BINARY | i\STRING_CASE_INSENSITIVE));
    }
}
