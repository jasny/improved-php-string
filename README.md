Jasny string functions
===

[![Build Status](https://travis-ci.org/jasny/string-functions.svg?branch=master)](https://travis-ci.org/jasny/string-functions)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jasny/string-functions/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jasny/string-functions/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/jasny/string-functions/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jasny/string-functions/?branch=master)
[![Packagist Stable Version](https://img.shields.io/packagist/v/jasny/string-functions.svg)](https://packagist.org/packages/jasny/string-functions)
[![Packagist License](https://img.shields.io/packagist/l/jasny/string-functions.svg)](https://packagist.org/packages/jasny/string-functions)

The PHP string functions are not up to the quality what you ought to expect from a high level programming language.

This library provides a set of useful and consistent string functions for PHP. You should always use these functions
rather than the ones provided by PHP natively.

This library does not contain functions that deal with binary data, HTML, characterset, encoding, locale, phonetic,
string distance and streaming. Those deserve to have their own libraries.

To perform string operations dealing with a specific locale, use the
[`Collator` class](http://php.net/manual/en/class.collator.php) from the intl PHP extension instead.

All functions are multibyte (UTF-8) safe by default. To increase performance the `STRING_RAW` flag may be passed, which
only considers single byte strings. Other character sets should not be used.

_Note: No effort has been made to match the original native PHP function names._

Installation
---

    composer require jasny/string-functions

Functions
---

* [`string_equals(string $str1, string $str2[, int $flags])`](#string_equals)
* [`string_compare(string $str1, string $str2[, int $flags])`](#string_compare)
* [`string_contains(string $subject, string $substr[, int $flags])`](#string_contains)
* [`string_starts_with(string $subject, string $substr[, int $flags])`](#string_starts_with)
* [`string_ends_with(string $subject, string $substr[, int $flags])`](#string_ends_with)
* [`string_length(string $subject)`](#string_length)
* [`string_find_position(string $subject, string $substr[, int $flags])`](#string_find_position)
* [`string_is_type(string $subject, int $type)`](#string_is_type)
* [`string_contains_type(string $subject, int $type)`](#string_contains_type)
* [`string_slice(string $subject, int $offset[, int $length[, int $flags]])`](#string_slice)
* [`string_before(string $subject, string $substr[, int $flags])`](#string_before)
* [`string_after(string $subject, string $substr[, int $flags])`](#string_after)
* [`string_replace(string $subject, string|array $find, string|array $replace[, int $flags])`](#string_replace)
* [`string_trim(string $subject[, string $characters[, int $flags]])`](#string_trim)
* [`string_pad(string $subject, int $length[, string $characters, [int $flags]])`](#string_pad)
* [`string_repeat(string $subject, int $multiplier)`](#string_repeat)
* [`string_chunk(string $subject, int $length[, int $flags])`](#string_chunk)
* [`string_split(string $subject, string $delimiter[, int $limit])`](#string_split)
* [`string_convert_case(string $subject, int $flags)`](#string_convert)
* [`string_remove_accents(string $subject)`](#string_remove_accents)
* [`string_format(string $format, ...)`](#string_format)
* [`string_parse(string $subject, string $format)`](#string_parse)

Constants
---

### Flags

* `STRING_CASE_INSENSITIVE` - Case insensitive comparison
* `STRING_RAW` - Perform a (faster) multibyte unsafe operation

### Find flags

* `STRING_FIND_FIRST` - Find only the first occurrence of the substring
* `STRING_FIND_LAST` - Find only the last occurrence of the substring
* `STRING_FIND_ALL` - Find all occurrences of the substring

### Pad/trim flags

* `STRING_SIDE_LEFT` - Characters on the beginning of the string
* `STRING_SIDE_RIGHT` - Characters on the end of the string
* `STRING_SIDE_BOTH` - Characters on both sides of the string

### Types

* `STRING_TYPE_ALNUM` - Alphanumeric characters
* `STRING_TYPE_ALPHA` - Alphabetic characters
* `STRING_TYPE_CNTRL` - Control character
* `STRING_TYPE_DIGIT` - Numeric characters
* `STRING_TYPE_GRAPH` - Any printable characters except space
* `STRING_TYPE_LOWER` - Lowercase characters
* `STRING_TYPE_PRINT` - Printable character
* `STRING_TYPE_PUNCT` - Any printable character which is not whitespace or an alphanumeric character
* `STRING_TYPE_SPACE` - Whitespace characters
* `STRING_TYPE_UPPER` - Uppercase characters
* `STRING_TYPE_XDIGIT` - Characters representing a hexadecimal digit

### Case conversions

* `STRING_UPPERCASE` - Uppercase characters
* `STRING_LOWERCASE` - Lowercase characters
* `STRING_TITLE` - Uppercase the first character of each word


Reference
---

### string_equals

    bool string_equals(string $str1, string $str2, int $flags = 0)

Compare two strings. Return `true` if the two strings are equal and `false` otherwise.

### string_compare

    int string_compare(string $left, string $right, int $flags = 0)

Compare two strings. Return -1 if str1 is less than str2; 1 if str1 is greater than str2, and 0 if they are equal.

This function can be used for sorting as set of strings.

### string_contains

    bool string_contains(string $subject, string $substr, int $flags = 0)

Check if a string contains a substring.

### string_starts_with

    bool string_starts_with(string $subject, string $substr, int $flags = 0)

Check if a string starts with a substring.

### string_ends_with

    bool string_ends_with(string $subject, string $substr, int $flags = 0)

Check if a string ends with a substring.

### string_length

    int string_length(string $subject, int $flags = 0)

Get the length of a string.

### string_find_position

    int string_find_position(string $subject, string $substr, int $flags = STRING_FIND_FIRST)

Find the position of a substring.

On `STRING_FIND_FIRST` or `STRING_FIND_LAST`, the position is returned as integer. If string doesn't contain the
substring, `-1` is returned. `STRING_FIND_ALL` is not supported.

### string_is_type

    bool string_is_type(string $subject, int $type)

Check whether **all** characters of a string falls into a certain character class.

The type is a binary set. Specify the type with one or more of the `STRING_TYPE_*` constants.

### string_contains_type

    bool string_contains_type(string $subject, int $type)

Check whether **any** characters of a string falls into a certain character class.

The type is a binary set. Specify the type with one or more of the `STRING_TYPE_*` constants.

### string_slice

    string string_slice(string $subject, int $offset, int $length = null, int $flags = 0)

Get a portion of the string.

If offset is non-negative, the result will start at that offset in the string. If offset is negative, the sequence
will start that far from the end of the string.

If length is positive, then the result will up to be that length. If length is negative then the result will stop
that many characters from the end of the array. If it is omitted, then the result will have everything from offset
up until the end of the string.

### string_before

    string string_before(string $subject, string $substr, int $flags = STRING_FIND_FIRST)

Get the portion of the string before the given substring.

Returns `null` if the string isn't found. If you want to get the complete string if the substring isn't found, use

    $result = string_before($subject, $substr) ?? $subject;

`STRING_FIND_FIRST` or `STRING_FIND_LAST` may be used, but not `STRING_FIND_ALL`.

### string_after

    string string_after(string $subject, string $substr, int $flags = STRING_FIND_FIRST)

Get the portion of the string after the given substring.

Returns `null` if the string isn't found. If you want to get the complete string if the substring isn't found, use

    $result = string_after($subject, $substr) ?? $subject;

`STRING_FIND_FIRST` or `STRING_FIND_LAST` may be used, but not `STRING_FIND_ALL`.

### string_replace

    string string_replace(string $subject, string|array $find, string|array $replace, int $flags = STRING_FIND_ALL)

Find and replace substrings.

You may search for different subscripts by specifying find as array. If find is an array replace may still be a single
value, or may be an array in which case the each term in find is matched with a replacement.

In case there is an associative array with find / replace pairs, use `array_keys` and `array_values`.

    $result = string_replace($subject, array_keys($replace), array_values($replace));

### string_trim

    string string_trim(string $subject, string $characters = " \t\n\r\0\x0B", int $flags = STRING_SIDE_BOTH)

Strip characters from the beginning and/or end of a string.

By default whitespace characters are trimmed from both ends.

### string_pad

    string string_pad(string $subject, int $length, string $characters = " ", int $flags = STRING_SIDE_RIGHT)

Pad a string to a certain length.

_Note: If `STRING_SIDE_BOTH` is specified and an uneven number of characters, more padding is added to the right._

### string_repeat

    string string_repeat(string $subject, int $multiplier)

Repeat the string multiple times.

Multiplier must be greater than or equal to 0. If the multiplier is set to 0, the function will return an empty string.

### string_chunk

    array string_chunk(string $subject, int $length, int $flags = 0)

Split the string in chunks of a specific length. A length of 1 splits the string into characters.

### string_split

    array string_split(string $subject, string $delimiter, int $limit = null, int $flags = 0)

Split up a string using a delimiter.

An empty delimiter splits the string into characters.

If limit is set and positive, the returned array will contain a maximum of limit elements with the last element
containing the rest of string. If the limit parameter is negative, all components except the last -limit are returned.

### string_convert_case

    array string_convert_case(string $subject, int $flags)

Convert the alphabetic characters in a string to lowercase or uppercase.

If `STRING_TITLE` is specified, the first character of each words is converted to upper case. This may be mixed
with `STRING_LOWERCASE` to convert the other characters to lower case. By default other characters are untouched.

    $result = string_convert_case($subject, STRING_TITLE | STRING_LOWERCASE);

Optionally the conversion may specify a `STRING_SIDE_*` constant. To upper case the first character of a string do

    $result = string_convert_case($subject, STRING_UPPERCASE | STRING_SIDE_LEFT);

### string_remove_accents

    string string_remove_accents(string $subject)

Replace alphabetic characters with accents with similar ASCII characters.

### string_format

    string string_format(string $format, ...)

Create a formatted string. See [sprintf()](https://php.net/sprintf) for more information.

### string_parse

    string string_parse(string $subject, string $format)

Parse a string, interpreted according to the specified format. See [sscanf()](https://php.net/sscanf) for more
information.

## Notes to the reader

The code in this library is ugly so your code doesn't have to be. Do not take this as example as how to program.

The intention is to turn this library into a PHP extension.

