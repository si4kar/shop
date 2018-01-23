<?php


error_reporting(E_ALL);

require_once __DIR__ . 'components/Autoload.php';
$autoloader = new \components\Autoload(__DIR__);

$config = require_once __DIR__ .'/configs/main.php';
(new components\Application($config))->run();


