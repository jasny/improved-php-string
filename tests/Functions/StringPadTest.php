<?php

namespace Improved\Tests\Functions;

use Improved as i;
use PHPStan\Testing\TestCase;

/**
 * @covers \Improved\string_pad
 */
class StringPadTest extends TestCase
{
    public function testRight()
    {
        $padded = i\string_pad("hi", 9, "ée", i\STRING_SIDE_RIGHT);

        $this->assertEquals("hiéeéeéeé", $padded);
    }

    public function testLeft()
    {
        $padded = i\string_pad("hi", 9, "ée", i\STRING_SIDE_LEFT);

        $this->assertEquals("éeéeéeéhi", $padded);
    }

    public function testBoth()
    {
        $padded = i\string_pad("hi", 9, "ée");

        $this->assertEquals("éeéhiéeée", $padded);
    }
}
