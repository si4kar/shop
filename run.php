<?php

error_reporting(E_ALL);

require_once __DIR__ . '/components/Autoload.php';
spl_autoload_register([new \components\Autoload(__DIR__), 'load']);


$config =  array_merge(
    require_once __DIR__ .'/configs/main.php',
    require_once __DIR__ .'/configs/console.php'
);
(new components\console\Application($config))->run();