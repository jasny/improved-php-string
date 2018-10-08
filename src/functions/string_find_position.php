<?php

declare(strict_types=1);

namespace Improved;

/**
 * Find the position of a substring.
 *
 * On `STRING_FIND_FIRST` or `STRING_FIND_LAST`, the position is returned as integer. If string doesn't contain the
 * substring, `-1` is returned.
 *
 * @param string $subject
 * @param string $substr
 * @param int    $flags   Binary set with a STRING_FIND_* constant + other flags
 * @return int
 */
function string_find_position(string $subject, string $substr, int $flags = STRING_FIND_FIRST): int
{
    $filterFlags = (STRING_FIND_FIRST | STRING_FIND_LAST | STRING_CASE_INSENSITIVE | STRING_BINARY);

    switch ($flags & $filterFlags) {
        case STRING_FIND_FIRST:
            return _pos_false_to_negative(\mb_strpos($subject, $substr));
        case STRING_FIND_LAST:
            return _pos_false_to_negative(\mb_strrpos($subject, $substr));
        case STRING_CASE_INSENSITIVE | STRING_FIND_FIRST:
            return _pos_false_to_negative(\mb_stripos($subject, $substr));
        case STRING_CASE_INSENSITIVE | STRING_FIND_LAST:
            return _pos_false_to_negative(\mb_strripos($subject, $substr));
        case STRING_BINARY | STRING_FIND_FIRST:
            return _pos_false_to_negative(\strpos($subject, $substr));
        case STRING_BINARY | STRING_FIND_LAST:
            return _pos_false_to_negative(\strrpos($subject, $substr));
        case STRING_BINARY | STRING_CASE_INSENSITIVE | STRING_FIND_FIRST:
            return _pos_false_to_negative(\stripos($subject, $substr));
        case STRING_BINARY | STRING_CASE_INSENSITIVE | STRING_FIND_LAST:
            return _pos_false_to_negative(\strripos($subject, $substr));
        default:
            return _pos_false_to_negative(\mb_strpos($subject, $substr));
    }
}

/**
 * Helper function; Turns `false` into -1.
 * @interal
 *
 * @param int|bool $pos
 * @return int
 */
function _pos_false_to_negative($pos): int
{
    return $pos === false ? -1 : $pos;
}
