<?php

$dbConnect = null;


function getDbConnection()
{
    global $dbConnect;
    if(null === $dbConnect) {
       $config = getFromConfig('db');

       $host = getArrayValue($config, 'host');
       $user = getArrayValue($config, 'user');
       $password = getArrayValue($config, 'password');
       $dbName = getArrayValue($config, 'db_name');

       $dbConnect = @mysqli_connect($host, $user, $password, $dbName) or die('DB connection error');
    }
    return $dbConnect;
}