<?php

declare(strict_types=1);

namespace Improved;

/** Perform a binary safe (multibyte unsafe) operation */
const STRING_BINARY = 0x0100;
/** Case insensitive comparison */
const STRING_CASE_INSENSITIVE = 0x0200;

/** Find only the first occurrence of the substring */
const STRING_FIND_FIRST = 0x0001;
/** Find only the last occurrence of the substring */
const STRING_FIND_LAST = 0x0002;
/** Find all occurrences of the substring */
const STRING_FIND_ALL = 0x0000;

/** Characters on the beginning of the string */
const STRING_SIDE_LEFT = 0x0001;
/** Characters on the end of the string */
const STRING_SIDE_RIGHT = 0x0002;
