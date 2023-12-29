<!-- dang ky -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

update('users', [
    'fullname' => 'Nguyễn Văn Tiến',
    'email' => 'tienhg201@gmail.com',
], 'id=2');

$data = [
    'pageTitle' => 'Đăng ký tài khoản'
];
layout('header', $data);
?>

<div class="row">
    <div class='col-4' style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng ký quản lý user</h2>
        <form action="" method="post">
            <div class="form-group mg-form">
                <label for="">Họ tên</label>
                <input type="text" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input type="email" class="form-control" placeholder="Địa chỉ email">
            </div>
            <div class="form-group mg-form">
                <label for="">Số điện thoại</label>
                <input type="number" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group mg-form">
                <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <div class="form-group mg-form">
                <label for="">Nhập lại Password</label>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>
            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng ký</button>
            <hr>
            <p class="text-center">Bạn đã có tài khoản? <a href="?module=auth&action=login">Đăng nhập</a></p>
        </form>
    </div>
</div>

<?php
layout('footer');
?>