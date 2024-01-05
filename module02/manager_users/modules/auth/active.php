<!-- xac thuc -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

layout('header');

$token = filter()['token'];
if (!empty($token)) {
    // truy van de kiem tra 
    $tokenQuery = getOneRaw("SELECT id FROM users WHERE activeToken = '$token'");

    if (!empty($tokenQuery)) {
        $userId = $tokenQuery['id'];
        $dataUpdate = [
            'status' => 1,
            'activeToken' => null,
        ];
        $updateStatus = update('users', $dataUpdate, "id='$userId'");
        if ($updateStatus) {
            setFlashData('msg', "Active success!!");
            setFlashData('msg_type', 'success');
        } else {
            setFlashData('msg', "Cant active, please call admin!!");
            setFlashData('msg_type', 'danger');
        }
        redirect('?module=auth&action=login');
    } else {
        getMsg('Liên kết đã hết hạn hoặc không tồn tại vui lòng thử lại!', 'danger');
    }
} else {
    getMsg('Liên kết không đúng!', 'danger');
}
?>
<?php
layout('footer')
    ?>