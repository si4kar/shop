<?php

$migrationName = getArrayValue($argv, 2);
if (empty($migrationName)) {
    die('Migration name is required');
}

$migrationsDir = getFromConfig('migrations.dir');

$prefix = 'm' . time() . '_';
$content = <<<PHP
<?php

function {$prefix}up()
{

}

function {$prefix}down()
{

}
PHP;
file_put_contents("{$migrationsDir}/{$prefix}_{$migrationName}.php", $content);

echo "Migration {$prefix}_{$migrationName} created successfully\r\n";
