<!-- dang xuat -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}


if (isLogin()) {
    $token = getSession('loginToken');
    delete('tokenlogin', "token='$token'");
    removeSession('loginToken');
    redirect('?module=auth&action=login');
}
?>