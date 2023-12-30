<!-- file chay chinh -->
<?php

session_start();
require_once('config.php');

// mailer library
// require_once('./includes/phpmailer/Exception.php');
// require_once('./includes/phpmailer/PHPMailer.php');
// require_once('./includes/phpmailer/SMTP.php');

require_once('./includes/functions.php');
require_once('./includes/connect.php');
require_once('./includes/database.php');
require_once('./includes/session.php');

require_once "vendor/autoload.php";

// $client = new Vonage\Client(new Vonage\Client\Credentials\Basic(_VONAGE_API_KEY, _VONAGE_API_API_SECRET));

// $response = $client->sms()->send(
//     new \Vonage\SMS\Message\SMS('0869318118', "TIENDEPTRAI", 'A text message sent using the Nexmo SMS API', 'unicode')
// );

// $message = $response->current();
// $data = $response->current();
// if ($message->getStatus() == 0) {
//     echo "The message was sent successfully\n";
// } else {
//     echo "The message failed with status: " . $message->getStatus() . "\n";
// }
// $sessionTest = setSession('test', 'test');
// var_dump($sessionTest);
// setFlashData('test', 'test description');
// echo getFlashData('test');

// sendMail('tienhg1310@gmail.com', '[Verify Email - Register]', 'Click here to verify your email address');

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

