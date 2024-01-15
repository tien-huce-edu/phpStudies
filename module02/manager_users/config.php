<!-- hang so trongphp -->
<?php

const _MODULE = 'home';
const _ACTION = 'dashboard';
const _CODE = true;

// thiet lap host
define('_WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/phpStudies/module02/manager_users');
define('_WEB_HOST_TEMPLATE', _WEB_HOST . '/templates');

// thiet lap duong dan
define('_WEB_PATH', __DIR__);
define('_WEB_PATH_TEMPLATE', _WEB_PATH . '/templates');

use Dotenv\Dotenv as Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


// thiet lap database
const _HOST_NAME = '127.0.0.1:3306';
const _DATABASE_NAME = 'tienhg2001';
const _DATABASE_USER_NAME = 'tienhg2001';
const _DATABASE_PASSWORD = 'tienhg2001';

const _VONAGE_API_KEY = '99fa3761';
const _VONAGE_API_API_SECRET = 'xksKNwbqqmZ5zqVp';