<?php

//Setting up variables
$migrationsTable = getFromConfig('migrations.table');
$downUserParameter = getArrayValue($argv, 2);
$migrationDir = getFromConfig('migrations.dir');
$migrationsToDelete = [];

// Checking user input of down parameter
if(empty($downUserParameter)) {
    $downUserParameter = "1";
}
//Getting all data from column migration of $migrationsTable

$sql = "SELECT migration FROM {$migrationsTable}";
$query = mysqli_query(getDbConnection(), $sql);

//Creating an array made of migration rows. Sorting array

while($line = mysqli_fetch_assoc($query)) {
    $migrationsToDelete[] = $line['migration'];
}
rsort($migrationsToDelete);

for($i = 0; $i < $downUserParameter; $i++) {
    //Checking if user input not bigger than array with migrations to delete

    if($downUserParameter > count($migrationsToDelete)) {
        die("You have no migrations to delete or \n You have exceeded the number of migrations available to delete");
    }

    require_once "{$migrationDir}/{$migrationsToDelete[$i]}";
    $prefix = substr($migrationsToDelete[$i], 0, strpos($migrationsToDelete[$i], '_'));
    $down = "{$prefix}_down";

    if($down()) {
        $sql = "DELETE FROM {$migrationsTable} WHERE migration = '{$migrationsToDelete[$i]}'";
        mysqli_query(getDbConnection(), $sql);

        echo "Migration {$migrationsToDelete[$i]} was deleted successfully\n";
    } else {
        die('Migration can not be deleted');
    }
}