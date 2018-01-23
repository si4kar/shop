<?php

namespace components\console;

use components\AbstractDispatcher;
use components\Config;
use helpers\ArrayHelper;

/**
 * @property string controller
 * @property array|mixed|null rout
 */
class Dispatcher extends AbstractDispatcher
{

    public function __construct()
    {
        $this->rout = ArrayHelper::getValue($_SERVER['argv'], 1, '');
        $parts = $this->prepareUrlToParts();

        $defaultController = Config::get('default.controller', 'index');
        $controllerParts = ArrayHelper::getValue($parts, 0, $defaultController);
        $this->controller = $this->prepareControllerClassName($controllerParts);

        $defaultAction = Config::get('default.action', 'index');
        $actionParts = ArrayHelper::getValue($parts, 1, $defaultAction);
        $this->action = $this->prepareActionFunctionName($actionParts);
    }


}