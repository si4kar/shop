<?php

namespace components\web;

use components\AbstractDispatcher;
use components\Config;
use helpers\ArrayHelper;

class Dispatcher extends AbstractDispatcher
{
    public function __construct()
    {
        $this->rout = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
        $parts = $this->prepareUrlToParts();

        $defaultController = Config::get('default.controller', 'index');
        $controllerParts = ArrayHelper::getValue($parts, 0, $defaultController);
        $this->controller = $this->prepareControllerClassName($controllerParts);

        $defaultAction = Config::get('default.action', 'index');
        $actionParts = ArrayHelper::getValue($parts, 1, $defaultAction);
        $this->action = $this->prepareActionFunctionName($actionParts);
    }
}