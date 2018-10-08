<?php

declare(strict_types=1);

namespace Improved;

/**
 * Find and replace substrings.
 *
 * You may search for different subscripts by specifying find as array. If find is an array replace may still be a
 * single value, or may be an array in which case the each term in find is matched with a replacement.
 *
 * @param string       $subject
 * @param string|array $find
 * @param string|array $replace
 * @param int          $flags
 * @return string
 */
function string_replace(string $subject, $find, $replace, int $flags = STRING_FIND_ALL): string
{
    if (($flags & (STRING_FIND_FIRST | STRING_FIND_LAST)) === 0) {
        return \str_replace($subject, $find, $replace);
    }

    $position = string_find_position($subject, $find, $flags);

    if ($position === -1) {
        return $subject;
    }

    return ($flags & STRING_BINARY) !== 0
        ? \substr_replace($subject, $replace, $position, \strlen($find))
        : \mb_substr($subject, 0, $position) . $replace . \mb_substr($subject, $position + \mb_strlen($find));
}
