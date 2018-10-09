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
    if (($flags & STRING_CASE_INSENSITIVE) === 0) {
        return $left === $right;
    }

    if (($flags & STRING_BINARY) !== 0) {
        return \strcasecmp($left, $right) === 0;
    }

    $leftUpper = \mb_strtoupper(\strtr($left, ['ß' => 'ẞ']), 'UTF-8');
    $rightUpper = \mb_strtoupper(\strtr($right, ['ß' => 'ẞ']), 'UTF-8');

    return $leftUpper === $rightUpper;
}
