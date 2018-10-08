<?php

declare(strict_types=1);

namespace Improved;

/**
 * Split up a string using a delimiter.
 *
 * An empty delimiter splits the string into characters.
 *
 * If limit is set and positive, the returned array will contain a maximum of limit elements with the last element
 * containing the rest of string. If the limit parameter is negative, all components except the last -limit are
 * returned.
 *
 * @param string $subject
 * @param string $delimiter
 * @param int    $limit
 * @param int    $flags
 * @return array
 */
function string_split(string $subject, string $delimiter, ?int $limit = null, int $flags = 0): array
{
    if (($flags & STRING_BINARY) !== 0) {
        return \explode($delimiter, $subject, $limit);
    }

    $parts = \mb_split($delimiter, $subject);

    if (isset($length) && \count($parts) > $length) {
        $last = \array_splice($parts, $length - 1);
        $parts[] = \implode($delimiter, $last);
    }

    return $parts;
}
