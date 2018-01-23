<?php
/**
 * Created by PhpStorm.
 * User: Sergii
 * Date: 15.01.2018
 * Time: 11:09
 */

namespace components;


abstract class Application
{
    public function __construct(array $config)
    {
        Config::addData($config);
    }

    abstract public function run();
}