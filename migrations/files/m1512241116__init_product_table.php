<?php

function m1512241116_up()
{
    $sql = <<<SQL
CREATE TABLE products (
id INT(11) auto_increment,
title VARCHAR(255) NOT NULL,
description TEXT,
price DECIMAL(2),
PRIMARY KEY (id)
)
SQL;

    return mysqli_query(getDbConnection(), $sql);
}

function m1512241116_down()
{
    $sql = <<<SQL
DROP TABLE products;
SQL;
    return mysqli_query(getDbConnection(), $sql);
}