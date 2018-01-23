<?php

namespace helpers;

class StringHelper
{
    /**
     * @param $string
     * @param string $delimiter
     * @return string
     */

    public static function camelize($string, $delimiter = '-')
    {
        $result = '';
        foreach (explode($delimiter, $string) as $part) {
            $result .= ucfirst(strtolower($part));
        }
        return $result;
    }

    /**
     * @param $string
     * @param $chars
     * @return mixed
     */
    public static function rtrim($string, $chars)
    {
        return rtrim($string, " \t\n\r\0\x0B{$chars}");
    }
}