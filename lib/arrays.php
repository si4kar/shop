<?php

/**
 * @param array $array
 * @param string $key
 * @param null $default
 * @return mixed|null
 */
function getArrayValue(array $array, $key, $default = null)
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

/**
 * @param $key
 * @param null $default
 * @return mixed|null
 */

function getFromConfig($key, $default = null)
{
    global $config;
    return getArrayValue($config, $key, $default);
}
