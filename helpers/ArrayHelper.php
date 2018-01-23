<?php

namespace helpers;


class ArrayHelper
{
    public static function getValue(array $array, $key, $default = null)
    {
        $parts = explode('.', $key);

        foreach ($parts as $part) {
            if (is_array($array) && array_key_exists($part, $array)) {
                $array = $array[$part];
            } else {
                return $default;
            }
        }

        return $array;
    }

}