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
