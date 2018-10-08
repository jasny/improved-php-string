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
    if ($flags & STRING_BINARY !== 0) {
        return \str_split($subject, $length);
    }

    $result = [];

    for ($i = 0, $n = \mb_strlen($subject); $i < $n; $i += $length) {
        $result[] = \mb_substr($subject, $i, $length);
    }

    return $result;
}
