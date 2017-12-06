<?php

/**
 * @return bool
 */

function getIsPostrequest()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * @param $url
 * @param int $status
 * @param bool $terminate
 */
function redirect ($url, $status = 301, $terminate = true)
{
    header("Location: {$url}", true, $status);
        if ($terminate) {
        exit;
        }
}