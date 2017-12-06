<?php
/***
 *
 */
function startSession()
{
    $sessionId = session_id();
    if (empty($sessionId)) {
        session_start();
    }
}

/**
 * @param $key
 * @param $value
 */
function addFlash($key, $value)
{
    startSession();
    $_SESSION[$key] = $value;
}

/**
 * @param $key
 * @param bool $delete
 */

function getFlash($key, $delete = true)
{
    startSession();
    $flash = getArrayValue($_SESSION, $key);

    if ($flash && $delete) {
        unset($_SESSION[$key]);
    }

    return $flash;
}

