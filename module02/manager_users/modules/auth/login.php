<!-- xay dung trang dang nhap -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
$data = [
    'pageTitle' => 'Đăng nhập tài khoản'
];
layout('header', $data);

$check = isEmail('tienhg2001');
$checkInt = isNumberFloat('');
echo var_dump($checkInt);
?>

<div class="row">
    <div class='col-4' style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng nhập quản lý user</h2>
        <form action="" method="post">
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input type="email" class="form-control" placeholder="Dia chi email">
            </div>
            <div class="form-group mg-form">
                <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Mat khau">
            </div>
            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng nhập</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=forgot">Quên mật khẩu</a></p>
            <p class="text-center">Bạn chưa có tài khoản? <a href="?module=auth&action=register">Đăng ký</a></p>
        </form>
    </div>
</div>

<?php
layout('footer');
?>