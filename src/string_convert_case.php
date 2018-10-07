<?php

declare(strict_types=1);

namespace Improved;

/**
 * Convert the alphabetic characters in a string to lowercase or uppercase.
 *
 * @param string $subject
 * @param int    $flags
 * @return string
 */
function string_convert_case(string $subject, int $flags): string
{
    return $flags & STRING_RAW === 0
        ? _string_convert_case_mb($subject, $flags)
        : _string_convert_case_raw($subject, $flags);
}

/**
 * @internal
 */
function _string_convert_case_raw(string $subject, int $flags): string
{
    switch ($flags & (STRING_UPPERCASE | STRING_LOWERCASE | STRING_TITLE | STRING_SIDE_LEFT | STRING_SIDE_RIGHT)) {
        case STRING_UPPERCASE:
        case STRING_UPPERCASE | STRING_TITLE:
            return strtoupper($subject);
        case STRING_LOWERCASE:
            return strtolower($subject);
        case STRING_TITLE:
            return ucwords($subject);
        case STRING_LOWERCASE | STRING_TITLE:
            return ucwords(strtolower($subject));

        case STRING_SIDE_LEFT | STRING_UPPERCASE:
        case STRING_SIDE_LEFT | STRING_TITLE:
        case STRING_SIDE_LEFT | STRING_UPPERCASE | STRING_TITLE:
            return ucfirst($subject);
        case STRING_SIDE_LEFT | STRING_LOWERCASE:
            return lcfirst($subject);

        case STRING_SIDE_RIGHT | STRING_UPPERCASE:
        case STRING_SIDE_RIGHT | STRING_TITLE:
        case STRING_SIDE_RIGHT | STRING_UPPERCASE | STRING_TITLE:
            return strrev(ucfirst(strrev($subject)));
        case STRING_SIDE_RIGHT | STRING_LOWERCASE:
            return strrev(lcfirst(strrev($subject)));

        default:
            return $subject;
    }
}

/**
 * @internal
 */
function _string_convert_case_mb(string $subject, int $flags): string
{
    $mode = ($flags & (STRING_UPPERCASE | STRING_LOWERCASE | STRING_TITLE)) >> 9;

    switch ($flags & (STRING_SIDE_LEFT | STRING_SIDE_RIGHT)) {
        case STRING_SIDE_LEFT:
            return _mb_convert_case_first($subject, $mode);
        case STRING_SIDE_RIGHT:
            return _mb_convert_case_last($subject, $mode);
        default:
            return mb_convert_case($subject, $mode);
    }
}

/**
 * @internal
 */
function _mb_convert_case_first(string $string, int $mode): string
{
    $length = mb_strlen($string);
    $firstChar = mb_substr($string, 0, 1);
    $rest = mb_substr($string, 1, $length - 1);

    return mb_convert_case($firstChar, $mode) . $rest;
}

/**
 * @internal
 */
function _mb_convert_case_last(string $string, int $mode): string
{
    $lastChar = mb_substr($string, -1, 1);
    $rest = mb_substr($string, 0, -1);

    return $rest . mb_convert_case($lastChar, $mode);
}
