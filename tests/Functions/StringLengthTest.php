<?php

namespace Improved\Tests\Functions;

use Improved as i;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Improved\string_length
 */
class StringLengthTest extends TestCase
{
    public function provider()
    {
        return [
            ["abcdef", 6, 6],
            ["áb©déf", 6, 9],
            ["😉😱😸", 3, 12]
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testMultibyte(string $string, int $expected)
    {
        $this->assertEquals($expected, i\string_length($string));
    }

    /**
     * @dataProvider provider
     */
    public function testBinary(string $string, $_, int $expected)
    {
        $this->assertEquals($expected, i\string_length($string, i\STRING_BINARY));
    }
}
