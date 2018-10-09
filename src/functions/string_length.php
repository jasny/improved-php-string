<?php

declare(strict_types=1);

namespace Improved;

/**
 * Get the length of a string.
 *
 * @param string $subject
 * @param int    $flags
 * @return int
 */
function string_length(string $subject, int $flags = 0): int
{
    return ($flags & STRING_BINARY) === 0 ? \mb_strlen($subject) : \strlen($subject);
}
