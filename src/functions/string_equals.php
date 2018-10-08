<?php

declare(strict_types=1);

namespace Improved;

/**
 * Compare two strings. Return `true` if the two strings are equal and `false` otherwise.
 *
 * @param string $left
 * @param string $right
 * @param int    $flags
 * @return bool
 */
function string_equals(string $left, string $right, int $flags = 0): bool
{
    $filterFlags = (STRING_CASE_INSENSITIVE | STRING_BINARY);

    switch ($flags & $filterFlags) {
        case STRING_CASE_INSENSITIVE:
            return \mb_strtoupper($left, 'UTF-8') === \mb_strtoupper($right, 'UTF-8');
        case STRING_BINARY | STRING_CASE_INSENSITIVE:
            return \strcasecmp($left, $right) === 0;
        default:
            return $left === $right;
    }
}
