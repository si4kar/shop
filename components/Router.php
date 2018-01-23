<?php

namespace components;


class Router
{
    private $dispatcher;

    public function __construct(AbstractDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function init()
    {
        $controller = $this->dispatcher->getControllerClassName();
        if (!class_exists($controller))
        {
            throw new \Exception("Controller can not be loaded");
        }

        $controllerObject = new $controller;

        $action = $this->dispatcher->getActionMethodName();
        if(!method_exists($controllerObject, $action)){
            throw new \Exception("Action can not be loaded");
        }

        return $controllerObject->{$action}();
    }
}