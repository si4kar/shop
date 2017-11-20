<?php

/**
 * @param array $array
 * @param string $key
 * @param null|mixed $default
 * @return mixed|null
 */

function getArrayValue (array $array, $key, $default = null)
{
    return array_key_exists($key, $array) ? $array[$key] : $default;
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