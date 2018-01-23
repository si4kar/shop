<?php
/**
 * Created by PhpStorm.
 * User: Sergii
 * Date: 15.01.2018
 * Time: 14:26
 */

namespace components\web;

use components\Router;

class Application extends \components\Application
{
    public function run()
    {
        $dispatcher = new Dispatcher();
        (new Router($dispatcher))->init();
    }
}