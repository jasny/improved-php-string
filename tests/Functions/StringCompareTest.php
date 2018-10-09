<?php

namespace Improved\Tests\Functions;

use Improved as i;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Improved\string_compare
 */
class StringCompareTest extends TestCase
{
    public function caseSensitiveProvider()
    {
        return [
            ["abcdef", "abcdef", 0, 0],
            ["abcdef", "bar", -1, -1],
            ["abcdef", "AbCdEf", 1, 1],
            ["abcdef", "ábcdëf", 0, -1],
            ["áéß", "aess", 0, 1],
            ["ábcdëf", "bar", -1, 1],
            ["😉😱😸", "ab©def", 1, 1]
        ];
    }

    /**
     * @dataProvider caseSensitiveProvider
     */
    public function testMultibyte(string $left, string $right, int $expected)
    {
        $this->assertEquals($expected, i\string_compare($left, $right));
    }

    /**
     * @dataProvider caseSensitiveProvider
     */
    public function testBinary(string $left, string $right, $_, int $expected)
    {
        $this->assertEquals($expected, i\string_compare($left, $right, i\STRING_BINARY));
    }

    public function caseInsensitiveProvider()
    {
        return [
            ["abcdef", "abcdef", 0, 0],
            ["abcdef", "bar", -1, -1],
            ["abcdef", "AbCdEf", 0, 0],
            ["abcdef", "ábcdëf", 0, -1],
            ["áëk", "áëK", 0, 0],
            ["áëß", "ÁËẞ", 0, 1],
            ["áëß", "AESS", 0, 1]
        ];
    }

    /**
     * @dataProvider caseInsensitiveProvider
     */
    public function testMultibyteCaseInsensitive(string $left, string $right, int $expected)
    {
        $this->assertEquals($expected, i\string_compare($left, $right, i\STRING_CASE_INSENSITIVE));
    }

    /**
     * @dataProvider caseInsensitiveProvider
     */
    public function testBinaryCaseInsensitive(string $left, string $right, $_, int $expected)
    {
        $this->assertEquals($expected, i\string_compare($left, $right, i\STRING_BINARY | i\STRING_CASE_INSENSITIVE));
    }
}
