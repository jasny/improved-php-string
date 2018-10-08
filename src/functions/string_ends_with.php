<?php

namespace Improved;

/**
 * Check if a string ends with a substring.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags
 * @return bool
 */
function string_ends_with(string $subject, string $substr, int $flags = 0): bool
{
    $part = string_slice($subject, -1 * string_length($substr, $flags), null, $flags);

    return string_equals($part, $substr, $flags);
}
