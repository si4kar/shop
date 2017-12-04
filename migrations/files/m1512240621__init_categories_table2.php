<?php

function m1512240621_up()
{
    $sql = <<<SQL
CREATE TABLE categories (
id INT(11) auto_increment,
title VARCHAR(255) NOT NULL ,
PRIMARY KEY (id)
)
SQL;
    return mysqli_query(getDbConnection(), $sql);
}

function m1512240621_down()
{
    $sql = <<<SQL
DROP TABLE categories;
SQL;
    return mysqli_query(getDbConnection(), $sql);
}