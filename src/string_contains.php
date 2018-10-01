<?php

declare(strict_types=1);

namespace Jasny;

/**
 * Check if a string contains a substring.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags
 * @return bool
 */
function string_contains(string $subject, string $substr, int $flags = 0): bool
{
    return string_find_position($subject, $substr, $flags) !== -1;
}
