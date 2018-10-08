<?php

namespace Improved;

/**
 * Check if a string starts with a substring.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags
 * @return bool
 */
function string_starts_with(string $subject, string $substr, int $flags = 0): bool
{
    $part = \substr($subject, 0, \strlen($substr));

    return string_equals($part, $substr, $flags);
}
