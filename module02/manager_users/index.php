<!-- file chay chinh -->
<?php

session_start();
require_once('config.php');

echo _WEB_HOST;

$module = _MODULE;
$action = _ACTION;

if (!empty($_GET['module'] && is_string($_GET['module']))) {
    $module = $_GET['module'];
}

if (!empty($_GET['action'] && is_string($_GET['action']))) {
    $action = $_GET['action'];
}

$path = 'modules/' . $module . '/' . $action . '.php';

if (!file_exists($path)) {
    $path = 'modules/error/404.php';
    require_once($path);
} else {
    require_once($path);
}

