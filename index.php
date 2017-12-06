<?php


error_reporting(E_ALL);

$config = require_once __DIR__ . '/config.php';

require_once __DIR__ . '/lib/sessions.php';
require_once __DIR__ . '/lib/html.php';

require_once __DIR__ . '/lib/strings.php';
require_once __DIR__ . '/lib/arrays.php';
require_once __DIR__ . '/lib/database.php';
require_once __DIR__ . '/lib/request.php';

require_once __DIR__ . '/core/template.php';
require_once __DIR__ . '/core/router.php';



echo init();

