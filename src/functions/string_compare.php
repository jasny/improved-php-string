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
    $filterFlags = (STRING_CASE_INSENSITIVE | STRING_BINARY);

    switch ($flags & $filterFlags) {
        case STRING_CASE_INSENSITIVE:
            $ret = \strcmp(\mb_strtolower($left), \mb_strtolower($right));
            break;
        case STRING_BINARY | STRING_CASE_INSENSITIVE:
            $ret = \strcasecmp($left, $right);
            break;
        default:
            $ret = \strcmp($left, $left);
            break;
    }

    return $ret === 0 ? 0 : ($ret < 0 ? -1 : 1);
}
