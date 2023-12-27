<?php
define('SERVER_NAME', 'John Green');
const _AUTHOR_URL = 2;

echo SERVER_NAME;
echo '<br/>';
echo _AUTHOR_URL;

echo '<br/>';

$checkDefined = defined('_AUTHOR_URL');
var_dump($checkDefined);