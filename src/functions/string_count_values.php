<?php

declare(strict_types=1);

namespace Improved;

/**
 * Count the number of substring occurrences.
 *
 * @param string $subject
 * @param string $substr
 * @param int $flags
 * @return int
 */
function string_count_values(string $subject, string $substr, int $flags = 0): int
{
    $filterFlags = (STRING_CASE_INSENSITIVE | STRING_BINARY);

    switch ($flags & $filterFlags) {
        case STRING_BINARY | STRING_CASE_INSENSITIVE:
            return \substr_count(\strtoupper($subject), \strtoupper($substr));
        case STRING_BINARY:
            return \substr_count($subject, $substr);
        case STRING_CASE_INSENSITIVE:
            return \mb_substr_count(\mb_strtoupper($subject, 'UTF-8'), \mb_strtoupper($substr, 'UTF-8'), 'UTF-8');
        default:
            return \mb_substr_count($subject, $substr, 'UTF-8');
    }
}
