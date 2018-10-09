<?php

namespace Improved\Tests\Functions;

use Improved as i;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Improved\string_find_position
 * @covers \Improved\_pos_false_to_negative
 */
class StringFindPositionTest extends TestCase
{
    public function firstCaseSensitiveProvider()
    {
        return [
            ["abcdef", "/", -1, -1],
            ["ab/cd/ef", "/", 2, 2],
            ["áb/cd/ëf", "/", 2, 3],
            ["abcdefabc", "abc", 0, 0],
            ["abcdef", "cde", 2, 2],
            ["abcdef", "ce", -1, -1],
            ["abcdef", "CDE", -1, -1],
            ["abcdef", "ë", -1, -1],
            ["😉😱😸😱😉", "😱", 1, 4]
        ];
    }

    /**
     * @dataProvider firstCaseSensitiveProvider
     */
    public function testFirstMultibyte(string $subject, string $substr, int $expected)
    {
        $this->assertEquals($expected, i\string_find_position($subject, $substr));
    }

    /**
     * @dataProvider firstCaseSensitiveProvider
     */
    public function testFirstBinary(string $subject, string $substr, $_, int $expected)
    {
        $this->assertEquals(
            $expected,
            i\string_find_position($subject, $substr, i\STRING_FIND_FIRST | i\STRING_BINARY)
        );
    }

    /**
     * @dataProvider firstCaseSensitiveProvider
     */
    public function testImplicitSide(string $subject, string $substr, int $expected, $expectedBinary)
    {
        $this->assertEquals($expected, i\string_find_position($subject, $substr, 0));
        $this->assertEquals($expectedBinary, i\string_find_position($subject, $substr, i\STRING_BINARY));
    }


    public function firstCaseInsensitiveProvider()
    {
        return [
            ["abcdef", "/", -1, -1],
            ["ab/cd/ef", "/", 2, 2],
            ["áb/cd/ëf", "/", 2, 3],
            ["abcdef", "ABC", 0, 0],
            ["ABCDEF", "cDe", 2, 2],
            ["abcdef", "ë", -1, -1],
            ["áëkëk", "Ë", 1, -1],
            ["áëß", "ẞ", 2, -1],
            ["áëß", "s", -1, -1]
        ];
    }

    /**
     * @dataProvider firstCaseInsensitiveProvider
     */
    public function testFirstCaseInsensitiveMultibyte(string $subject, string $substr, int $expected)
    {
        $flags = i\STRING_FIND_FIRST | i\STRING_CASE_INSENSITIVE;
        $this->assertEquals($expected,i\string_find_position($subject, $substr, $flags));
    }

    /**
     * @dataProvider firstCaseInsensitiveProvider
     */
    public function testFirstCaseInsensitiveBinary(string $subject, string $substr, $_, int $expected)
    {
        $flags = i\STRING_FIND_FIRST | i\STRING_BINARY | i\STRING_CASE_INSENSITIVE;
        $this->assertEquals($expected, i\string_find_position($subject, $substr, $flags));
    }

    /**
     * @dataProvider firstCaseInsensitiveProvider
     */
    public function testImplicitSideCaseInsensitive(string $subject, string $substr, int $expected, $expectedBinary)
    {
        $this->assertEquals($expected, i\string_find_position($subject, $substr, i\STRING_CASE_INSENSITIVE));

        $this->assertEquals(
            $expectedBinary,
            i\string_find_position($subject, $substr, i\STRING_BINARY | i\STRING_CASE_INSENSITIVE)
        );
    }


    public function lastCaseSensitiveProvider()
    {
        return [
            ["abcdef", "/", -1, -1],
            ["ab/cd/ef", "/", 5, 5],
            ["áb/cd/ëf", "/", 5, 6],
            ["abcdefabc", "abc", 6, 6],
            ["ABCdefabc", "ABC", 0, 0],
            ["abcdef", "ë", -1, -1],
            ["😉😱😸😱😉", "😱", 3, 12]
        ];
    }

    /**
     * @dataProvider lastCaseSensitiveProvider
     */
    public function testLastMultibyte(string $subject, string $substr, int $expected)
    {
        $this->assertEquals($expected, i\string_find_position($subject, $substr, i\STRING_FIND_LAST));
    }

    /**
     * @dataProvider lastCaseSensitiveProvider
     */
    public function testLastBinary(string $subject, string $substr, $_, int $expected)
    {
        $this->assertEquals(
            $expected,
            i\string_find_position($subject, $substr, i\STRING_FIND_LAST | i\STRING_BINARY)
        );
    }

    public function lastCaseInsensitiveProvider()
    {
        return [
            ["abcdef", "/", -1, -1],
            ["ab/cd/ef", "/", 5, 5],
            ["áb/cd/ëf", "/", 5, 6],
            ["abcdefabc", "abc", 6, 6],
            ["ABCdefabc", "ABC", 6, 6],
            ["áëkëk", "Ë", 3, -1],
            ["áëß", "ẞ", 2, -1],
            ["áëß", "s", -1, -1]
        ];
    }

    /**
     * @dataProvider lastCaseInsensitiveProvider
     */
    public function testLastCaseInsensitiveMultibyte(string $subject, string $substr, int $expected)
    {
        $flags = i\STRING_FIND_LAST | i\STRING_CASE_INSENSITIVE;
        $this->assertEquals($expected, i\string_find_position($subject, $substr, $flags));
    }

    /**
     * @dataProvider lastCaseInsensitiveProvider
     */
    public function testLastCaseInsensitiveBinary(string $subject, string $substr, $_, int $expected)
    {
        $flags = i\STRING_FIND_LAST | i\STRING_BINARY | i\STRING_CASE_INSENSITIVE;
        $this->assertEquals($expected, i\string_find_position($subject, $substr, $flags));
    }
}
