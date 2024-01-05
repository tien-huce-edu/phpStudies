<!-- xay dung trang dang nhap -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
$data = [
    'pageTitle' => 'Quên mật khẩu'
];
layout('header', $data);


if (isLogin()) {
    redirect('?module=home&action=dashboard');
}

if (isPost()) {
    $filterAll = filter();
    if (!empty($filterAll['email'])) {
        $email = $filterAll['email'];
        echo $email;
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
        <h2 class="text-center text-uppercase">Quên mật khẩu</h2>
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
            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng nhập</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=forgot">Đăng nhập</a></p>
            <p class="text-center">Bạn chưa có tài khoản? <a href="?module=auth&action=register">Đăng ký</a></p>
        </form>
    </div>
</div>

<?php
layout('footer');
?>