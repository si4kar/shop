<?php
/**
 * @param $string
 * @param string $delimiter
 * @return string
 */


function camelizeString($string, $delimiter = '-')
{
    $result = '';
        foreach (explode($delimiter, $string) as $part) {
        $result .= ucfirst(strtolower($part));
    }
    return $result;
}