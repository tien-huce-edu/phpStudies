<!-- function common -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function layout($layoutName = 'header', $data = [])
{
    if (file_exists(_WEB_PATH_TEMPLATE . '/layout/' . $layoutName . '.php')) {
        require_once(_WEB_PATH_TEMPLATE . '/layout/' . $layoutName . '.php');
    }
}

// send mail
function sendMail($to, $subject, $content)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'tienhg201@gmail.com';                     //SMTP username
        $mail->Password = 'cjnw duis tirr gfap';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tienhg201@gmail.com', 'tienhg201');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "<h1>Xác nhận email đăng ký!</h1><strong>" . $content . "</strong>";

        $mail->send();
        return 'Gửi thành công';
    } catch (Exception $e) {
        return "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}

function isGet()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// filter lọc dữ liệu 

function filter()
{
    $data = [];
    if (isGet()) {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    if (isPost()) {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $data;
}

function isEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isNumberInt($number)
{
    return filter_var($number, FILTER_VALIDATE_INT);
}
function isNumberFloat($number)
{
    return filter_var($number, FILTER_VALIDATE_FLOAT);
}
function isPhone($phone)
{
    $checkZero = false;
    if ($phone[0] == '0') {
        $checkZero = true;
        $phone = substr($phone, 1);
    }

    $checkNumber = false;
    if (isNumberInt($phone) && strlen($phone) == 9) {
        $checkNumber = true;
    }

    return $checkNumber && $checkZero;
}

function getMsg($msg, $type)
{
    echo '<div class="alert alert-' . $type . '">' . $msg . '</div>';
}
function redirect($url = 'index.php')
{
    header('location: ' . $url);
    die();
}

function formError($findName, $beforeHTML = '', $afterHTML = '', $errors = [])
{
    echo (!empty($errors[$findName])) ? $beforeHTML . reset($errors[$findName]) . $afterHTML : '<span></span>';
}

function old($type = '', $old, $default = null)
{
    echo !empty($old[$type]) ? $old[$type] : $default;
}

function isLogin()
{
    $checkLogin = false;
    if (getSession('loginToken')) {
        $tokenLogin = getSession('loginToken');

        // check token trong db
        $queryToken = getOneRaw("SELECT user_id from tokenlogin WHERE token ='$tokenLogin'");
        if (!empty($queryToken)) {
            $checkLogin = true;
        } else {
            removeSession('loginToken');
        }
    }
    return $checkLogin;
}