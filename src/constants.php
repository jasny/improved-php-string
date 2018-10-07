<?php

declare(strict_types=1);

namespace Improved;

/** Case insensitive comparison */
const STRING_CASE_INSENSITIVE = 0x010000;
/** Perform a multibyte unsafe operation */
const STRING_RAW = 0x020000;

/** Find only the first occurrence of the substring */
const STRING_FIND_FIRST = 0x0001;
/** Find only the last occurrence of the substring */
const STRING_FIND_LAST = 0x0002;
/** Find all occurrences of the substring */
const STRING_FIND_ALL = 0x0000;

/** Characters on the beginning of the string */
const STRING_SIDE_LEFT = 0x0010;
/** Characters on the end of the string */
const STRING_SIDE_RIGHT = 0x0020;
/** Characters on both sides of the string */
const STRING_SIDE_BOTH = 0x0040;

/** Alphanumeric characters */
const STRING_TYPE_ALNUM = 0x0B00;
/** Alphabetic characters */
const STRING_TYPE_ALPHA = 0x0300;
/** Control character */
const STRING_TYPE_CNTRL = 0x4000;
/** Numeric characters */
const STRING_TYPE_DIGIT = 0x0800;
/** Any printable characters except space */
const STRING_TYPE_GRAPH = 0x2B00;
/** Lowercase characters */
const STRING_TYPE_LOWER = 0x0200;
/** Printable character */
const STRING_TYPE_PRINT = 0x3B00;
/** Any printable character which is not whitespace or an alphanumeric character */
const STRING_TYPE_PUNCT = 0x2000;
/** Whitespace characters */
const STRING_TYPE_SPACE = 0x1000;
/** Uppercase characters */
const STRING_TYPE_UPPER = 0x0100;
/** Characters representing a hexadecimal digit */
const STRING_TYPE_XDIGIT = 0x8800;

/** Uppercase characters */
const STRING_UPPERCASE = 0x0100;
/** Lowercase characters */
const STRING_LOWERCASE = 0x0200;
/** Uppercase the first character of each word */
const STRING_TITLE = 0x0400;
