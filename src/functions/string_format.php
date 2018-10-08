<?php

declare(strict_types=1);

namespace Improved;

/**
 * Create a formatted string.
 * @see vsprintf
 *
 * @param string $format
 * @param mixed  $args
 * @return string
 */
function string_format(string $format, ...$args): string
{
    $fullString = $format . join('', array_filter($args, 'is_string'));

    return \mb_detect_encoding($fullString, ['ASCII', 'UTF-8']) === 'ASCII'
        ? \vsprintf($format, $args)
        : _mb_vsprintf($format, $args);
}

/**
 * @internal
 */
function _mb_vsprintf(string $format, array $args): string
{
    $newArgs = [];

    \preg_match_all("`\%('.+|[0 ]|)([1-9][0-9]*|)s`U", $format, $results, PREG_SET_ORDER);

    foreach ($results as $result) {
        list($stringFormat, $filler, $size) = $result;

        if (\strlen($filler) > 1) {
            $filler = \substr($filler, 1);
        }

        while (!\is_string($arg = \array_shift($args))) {
            $newArgs[] = $arg;
        }

        $pos = \strpos($format, $stringFormat);

        $format = \substr($format, 0, $pos)
            . ($size ? \str_repeat($filler, $size - \strlen($arg)) : '')
            . \str_replace('%', '%%', $arg)
            . \substr($format, $pos + \strlen($stringFormat));
    }

    return \vsprintf($format, $newArgs);
}
