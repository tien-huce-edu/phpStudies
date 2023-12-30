<!-- session -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

// gán session
function setSession($key, $value)
{
    return $_SESSION[$key] = $value;
}

// hàm đọc session 

function getSession($key = '')
{
    if (empty($key)) {
        return $_SESSION;
    } else {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
}

// hàm xóa session
function removeSession($key = '')
{
    if (empty($key)) {
        session_destroy();
        return true;
    } else {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
    }
}


function setFlashData($key, $value) {
    $key = 'flash_' . $key;
    return setSession($key, $value);
}

function getFlashData($key = '') {
    $key = 'flash_' . $key;
    $data = getSession($key);
    removeSession($key);
    return $data;
}
