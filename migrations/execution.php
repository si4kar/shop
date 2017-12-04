<?php
$dbName = getFromConfig('db.db_name');
$migrationsTable = getFromConfig('migrations.table');
$sql = <<<SQL
SELECT
  table_name
FROM
  information_schema.tables
WHERE
  table_schema = '{$dbName}' AND
  table_name = '{$migrationsTable}'
SQL;
$migratesTableExists = (bool)mysqli_fetch_assoc(mysqli_query(getDbConnection(), $sql));
if (!$migratesTableExists) {
    $sql = <<<SQL
CREATE TABLE {$migrationsTable} (
  id INT(11) auto_increment,
  migration VARCHAR(255),
  execution_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)
SQL;
    $result = mysqli_query(getDbConnection(), $sql);
    if (!$result) {
        die('Migrations can not be initialized');
    }
}
$migrationsDir = getFromConfig('migrations.dir');
$executedMigrations = [];
$query = mysqli_query(getDbConnection(), "SELECT migration FROM {$migrationsTable}");
while ($line = mysqli_fetch_assoc($query)) {
    $executedMigrations[] = $line['migration'];
}
$migrations = array_filter(scandir($migrationsDir), function ($item) use ($executedMigrations) {
    return !in_array($item, array_merge(['.', '..'], $executedMigrations));
});
if (empty($migrations)) {
    die("Database is up to date\r\n");
}
foreach ($migrations as $migration) {
    require_once "{$migrationsDir}/{$migration}";
    $prefix = substr($migration, 0, strpos($migration, '_'));
    $up = "{$prefix}_up";
    if ($up()) {
        $sql = "INSERT INTO {$migrationsTable} (migration) VALUES ('{$migration}')";
        mysqli_query(getDbConnection(), $sql);
        echo "Migration {$migration} executed successfully\r\n";
    } else {
        echo mysqli_error(getDbConnection()) . PHP_EOL;
        die("Migration {$migration} can not be executed\r\n");
    }
}