<?php

declare(strict_types=1);

namespace Jasny;

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
    return $flags & (STRING_MULTIBYTE) === 0
        ? explode($delimiter, $subject, $limit)
        : _string_split_mb($subject, $delimiter, $limit);
}

/**
 * @internal
 * @todo Escape delimiter
 */
function _string_chunk_mb(string $subject, string $delimiter, ?int $length): array
{
    $parts = mb_split($delimiter, $subject);

    if (isset($length) && count($parts) > $length) {
        $last = array_splice($parts, $length - 1);
        $parts[] = implode($delimiter, $last);
    }

    return $parts;
}
