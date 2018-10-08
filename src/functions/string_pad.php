<?php

declare(strict_types=1);

namespace Improved;

/**
 * Pad a string to a certain length.
 *
 * @param string $subject
 * @param int    $length
 * @param string $characters
 * @param int    $flags
 * @return string
 */
function string_pad(string $subject, int $length, string $characters = " ", int $flags = STRING_SIDE_RIGHT): string
{
    $mode = ($flags & (STRING_SIDE_LEFT | STRING_SIDE_RIGHT | STRING_SIDE_BOTH)) >> 5;

    if (($flags & STRING_BINARY) === 0) {
        $bytes = \strlen($characters);
        $chars = \mb_strlen($characters, 'UTF-8');

        if ($bytes === $chars) {
            $length = \strlen($subject) - \mb_strlen($subject, 'UTF-8') + $length;
        } elseif (($flags & STRING_SIDE_BOTH) === 0) {
            $addChars = $length - \mb_strlen($subject, 'UTF-8');
            $add = (\floor($addChars / $chars) * $bytes)
                + \strlen(\mb_substr($characters, 0, $addChars % $chars));

            $length = \strlen($subject) + (int)($add);
        } else {
            $addChars = ($length - \mb_strlen($subject, 'UTF-8')) / 2;
            $add = (\floor($addChars / $chars) * $bytes)
                + \strlen(\mb_substr($characters, 0, $addChars % $chars));

            $length = \strlen($subject) + (int)($add * 2);
        }
    }

    return \str_pad($subject, $length, $characters, $mode);
}
