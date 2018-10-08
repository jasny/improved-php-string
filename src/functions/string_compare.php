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
 * @param int    $flags   Binary set with a STRING_FIND_* constant + other flags
 * @return int
 */
function string_compare(string $left, string $right, int $flags = 0): int
{
    $filterFlags = (STRING_FIND_FIRST | STRING_FIND_LAST | STRING_CASE_INSENSITIVE | STRING_BINARY);

    switch ($flags & $filterFlags) {
        case STRING_CASE_INSENSITIVE:
            return 0; //TODO
        case STRING_BINARY | STRING_CASE_INSENSITIVE:
            return _negative_const(strcasecmp($left, $right));
        default:
            return _negative_const(strcmp($left, $left));
    }
}

/**
 * Helper function; Turns negative to -1 and positive to 1.
 * @interal
 *
 * @param int $ret
 * @return int
 */
function _negative_const(int $ret): int
{
    return $ret === 0 ? 0 : ($ret < 0 ? -1 : 1);
}
