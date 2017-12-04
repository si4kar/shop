<?php

error_reporting(E_ALL);

if (php_sapi_name() != 'cli'){
    die('Migrations allowed from CLI only');
}

$config = require_once __DIR__ . '/config.php';

require_once __DIR__ . '/lib/arrays.php';
require_once __DIR__ . '/lib/database.php';

$action = getArrayValue($argv, 1);

switch ($action) {
    case 'create':
        require_once __DIR__ . '/migrations/create.php';
        break;
    case 'up':
        require_once __DIR__ . '/migrations/execution.php';
        break;
    case 'down':
        require_once __DIR__ . '/migrations/down.php';
        break;
}
