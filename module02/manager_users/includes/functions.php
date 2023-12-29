<!-- function common -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

function layout($layoutName = 'header', $data = [])
{
    if (file_exists(_WEB_PATH_TEMPLATE . '/layout/' . $layoutName . '.php')) {
        require_once(_WEB_PATH_TEMPLATE . '/layout/' . $layoutName . '.php');
    } 
}