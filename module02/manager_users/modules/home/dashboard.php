<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}


$data = [
    'pageTitle' => 'Trang Dashboard'
];
layout('header', $data);

if (!isLogin()) {
    redirect('?module=auth&action=login');
}
?>

<h1>Dashboard</h1>

<?php
require_once(_WEB_PATH_TEMPLATE . '/layout/footer.php');
?>