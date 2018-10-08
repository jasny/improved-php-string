<?php

declare(strict_types=1);

namespace Improved;

/**
 * Get the portion of the string before the given substring.
 *
 * Returns `null` if the string isn't found.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags   Binary set with a STRING_FIND_* constant + other flags
 * @return string|null
 */
function string_before(string $subject, string $substr, int $flags = STRING_FIND_FIRST): ?string
{
    $pos = string_find_position($subject, $substr, $flags);

    if ($pos < 0) {
        return null;
    }

    return $flags & STRING_BINARY === 0 ? mb_substr($subject, 0, $pos) : substr($subject, 0, $pos);
}
