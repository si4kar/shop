<?php

namespace components;

use helpers\ArrayHelper;

class Config
{
    /**
     * @var array
     */
    private static $storage = [];

    /**
     * @param $data
     */
    public static function addData(array $data)
    {
        self::$storage = array_merge(self::$storage, $data);
    }

    /**
     * @param $key
     * @param null $default
     * @return array|mixed|null
     */
    public static function get($key, $default = null)
    {
        return ArrayHelper::getValue(self::$storage, $key, $default);
    }


}