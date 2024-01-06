<!-- xay dung trang dang nhap -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
$data = [
    'pageTitle' => 'Quên mật khẩu'
];
layout('header-login', $data);


if (isLogin()) {
    redirect('?module=home&action=dashboard');
}

if (isPost()) {
    $filterAll = filter();
    if (!empty($filterAll['email'])) {
        $email = $filterAll['email'];
        $queryUser = getOneRaw("SELECT id, email FROM users WHERE email = '$email'");

        if (!empty($queryUser)) {
            $userId = $queryUser['id'];
            $userEmail = $queryUser['email'];
            // create forgot token 
            $forgotToken = sha1(uniqid() . time());
            $dataInsert = [
                'forgotToken' => $forgotToken,
            ];
            $updateStatus = update('users', $dataInsert, "id = $userId");

            if ($updateStatus) {
                // tao link reset password
                $linkReset = _WEB_HOST . "?module=auth&action=reset&token=$forgotToken";
                // gui mail cho nguoi dung
                $subject = '[Reset password]';
                $content = '<h1>Chào bạn!</h1><br/><p>Chúng tôi nhận được yêu cầu đổi lại mật khẩu của bạn.</p><br/> <p>Vui lòng <a href="' . $linkReset . '">click vào đây</a> để khôi phục mật khẩu</p><br/> <p>Trân trọng cảm ơn</p>';
                $sendEmail = sendMail($userEmail, $subject, $content);
                if ($sendEmail) {
                    setFlashData('msg', 'Vui lòng kiểm tra email để đổi mật khẩu');
                    setFlashData('msg_type', 'success');
                } else {
                    setFlashData('msg', 'Lỗi hệ thống vui lòng thử lại');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Không thể đặt lại mật khẩu lòng thử lại');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tồn tại!');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng nhập email!');
        setFlashData('msg_type', 'danger');
    }
    redirect('?module=auth&action=forgot');
}


$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
?>

<div class="row">
    <div class='col-4' style="margin: 50px auto;">
        <h3 class="text-center text-uppercase">Nhập địa chỉ email để lấy lại mật khẩu</h3>
        <br />
        <?php
        if (!empty($msg)) {
            getMsg($msg, $msg_type);
        }
        ?>
        <form action="" method="post" novalidate>
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Dia chi email">

            </div>
            <button type="submit" class="mg-btn btn btn-primary btn-block">Xác nhận</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=forgot">Đăng nhập</a></p>
            <p class="text-center">Bạn chưa có tài khoản? <a href="?module=auth&action=register">Đăng ký</a></p>
        </form>
    </div>
</div>

<?php
layout('footer-login');
?>