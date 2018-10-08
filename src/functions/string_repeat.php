<?php

declare(strict_types=1);

namespace Improved;

/**
 * Repeat the string multiple times.
 *
 * Multiplier must be greater than or equal to 0. If the multiplier is set to 0, the function will return an empty
 * string.
 *
 * @param string $string
 * @param int    $multiplier
 * @return string
 */
function string_repeat(string $string, int $multiplier): string
{
    return \str_repeat($string, $multiplier);
}
