<?php

function m1512397595_up()
{
    $sql = <<<SQL
CREATE UNIQUE INDEX `idx-unique-categories-title` ON categories(title)
SQL;
    return mysqli_query(getDbConnection(), $sql);
}

function m1512397595_down()
{

}