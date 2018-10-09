<?php

declare(strict_types=1);

namespace Improved;

/**
 * Compare two strings. Return -1 if str1 is less than str2; 1 if str1 is greater than str2, and 0 if they are equal.
 *
 * This function can be used for sorting as set of strings.
 *
 * @param string $left
 * @param string $right
 * @param int    $flags
 * @return int
 */
function string_compare(string $left, string $right, int $flags = 0): int
{
    if (($flags & STRING_BINARY) === 0) {
        $left = string_transliterate($left);
        $right = string_transliterate($right);
    }

    $ret = (($flags & STRING_CASE_INSENSITIVE) === 0)
        ? \strcmp($left, $right)
        : \strcasecmp($left, $right);

    return $ret === 0 ? 0 : ($ret < 0 ? -1 : 1);
}
