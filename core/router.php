<?php

function init()
{
    $parts = prepareUrlToParts();

    $controller = prepareControllerFileName(getArrayValue($parts, 0 , 'index'));

    $controllersRout = getFromConfig('controllersDir');
    $controllerFile = "{$controllersRout}/{$controller}";
    if (!file_exists($controllerFile)){
        die('Controller is not exists');
    }

    require_once $controllerFile;

    $action = prepareActionFunctionName(getArrayValue($parts, 1 , 'index'));;
    if (!function_exists($action)){
        die('Action is not exists');
    }

    return $action();

}

/**
 * @param $url
 * @return array
 */

function prepareUrlToParts()
{
    $url = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
    $getParamsStart = strpos($url, '?');

    if (false !== $getParamsStart) {
        $url = substr($url, 0, $getParamsStart);
    }
   return array_filter(explode('/', $url));
}

 /**
 * @param string $urlPart
 * @return string
 */

function prepareControllerFileName($urlPart)
{

    return camelizeString($urlPart) . 'Controller.php';
}

/**
 * @param string $urlPart
 * @return string
 */

function prepareActionFunctionName($urlPart)
{
    return 'action' . camelizeString($urlPart);
}