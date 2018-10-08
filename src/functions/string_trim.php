<?php

declare(strict_types=1);

namespace Improved;

/**
 * Strip characters from the beginning and/or end of a string.
 *
 * @param string $subject
 * @param string $characters
 * @param int    $flags
 * @return string
 */
function string_trim(string $subject, string $characters = " \t\n\r\0\x0B", int $flags = STRING_SIDE_BOTH): string
{
    $side = $flags & (STRING_SIDE_LEFT | STRING_SIDE_RIGHT);

    if (($flags & STRING_BINARY) !== 0) {
        switch ($side) {
            case STRING_SIDE_LEFT:
                return \ltrim($subject, $characters);
            case STRING_SIDE_RIGHT:
                return \rtrim($subject, $characters);
            default:
                return \trim($subject, $characters);
        }
    }

    $replace = ($side === STRING_SIDE_LEFT ? '^' : '')
        . '[' . \preg_quote($characters, '#') . ']*'
        . ($side === STRING_RIGHT_LEFT ? '$' : '');

    return \preg_replace('/' . $replace . '/u', '', $subject);
}
