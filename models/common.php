<?php
function last_error($error = '')
{
    static $lastError = '';
    if ($error === '') {
        return $lastError;
    }
    $lastError = $error;
}

function checker($fname)
{
    return !preg_match('/[^0-9A-Za-z-_ :]/', $fname);
}

function check_controller($fname)
{
    return !preg_match('/[^0-9A-Za-z-_]/', $fname);
}

function template($view, $vars = [])
{
    extract($vars);
    ob_start();
    include "./views/{$view}.php";
    return ob_get_clean();
}
