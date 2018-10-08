<?php

declare(strict_types=1);

/**
 * Interleave two string.
 *
 * @param string $left
 * @param string $right
 * @param int    $flags
 * @return string
 */
function string_interleave(string $left, string $right, $flags = 0): string
{
    $leftChars = string_chunk($left, 1, $flags);
    $rightChars = string_chunk($right, 1, $flags);

    $chars = [];

    for ($i = 0, $n = \max(\count($leftChars), \count($rightChars)); $i < $n; $i++) {
        if (isset($leftChars[$i])) {
            $chars[] = $leftChars[$i];
        }

        if (isset($rightChars[$i])) {
            $chars[] = $rightChars[$i];
        }
    }

    return \join('', $chars);
}
