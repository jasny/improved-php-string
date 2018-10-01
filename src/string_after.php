<?php

declare(strict_types=1);

namespace Jasny;

/**
 * Get the portion of the string after the given substring.
 *
 * Returns `null` if the string isn't found.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags   Binary set with a STRING_FIND_* constant + other flags
 * @return string|null
 */
function string_after(string $subject, string $substr, int $flags = STRING_FIND_FIRST): ?string
{
    $pos = string_find_position($subject, $substr, $flags);
    $len = string_length($subject, $flags);

    if ($pos < 0) {
        return null;
    }

    return $flags & STRING_RAW === 0 ? mb_substr($subject, 0, $pos + $len) : substr($subject, $pos + $len);
}
