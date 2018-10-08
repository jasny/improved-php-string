<?php

declare(strict_types=1);

namespace Improved;

/**
 * Get a portion of the string.
 *
 * If offset is non-negative, the result will start at that offset in the string. If offset is negative, the sequence
 * will start that far from the end of the string.
 *
 * If length is positive, then the result will up to be that length. If length is negative then the result will stop
 * that many characters from the end of the array. If it is omitted, then the result will have everything from offset
 * up until the end of the string.
 *
 * @param string $subject
 * @param int    $offset
 * @param int    $length
 * @param int    $flags
 * @return string
 */
function string_slice(string $subject, int $offset, int $length = null, int $flags = 0): string
{
    return ($flags & STRING_BINARY) !== 0
        ? \substr($subject, $offset, $length)
        : \mb_substr($subject, $offset, $length);
}
