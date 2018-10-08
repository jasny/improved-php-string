<?php

declare(strict_types=1);

namespace Improved;

/**
 * Split the string in chunks of a specific length.
 *
 * @param string $subject
 * @param int    $length
 * @param int    $flags
 * @return array
 */
function string_chunk(string $subject, int $length, int $flags = 0): array
{
    return $flags & (STRING_BINARY) === 0
        ? _string_chunk_mb($subject, $length)
        : str_split($subject, $length);
}

/**
 * @internal
 */
function _string_chunk_mb(string $subject, int $length): array
{
    $result = [];

    for ($i = 0, $n = mb_strlen($subject); $i < $n; $i += $length) {
        $result[] = mb_substr($subject, $i, $length);
    }

    return $result;
}
