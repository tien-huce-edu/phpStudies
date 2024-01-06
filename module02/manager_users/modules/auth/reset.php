<!-- reset pass -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

$data = [
    'pageTitle' => 'Đặt lại mật khẩu'
];
layout('header-login', $data);

$token = filter()['token'];
if (!empty($token)) {
    $tokenQuery = getOneRaw("SELECT id, fullname, email FROM users WHERE forgotToken='$token'");

    if ($tokenQuery) {
        if (isPost()) {
            $filterAll = filter();
            $errors = [];

            // validate password
            if (empty($filterAll['password'])) {
                $errors['password']['require'] = 'Vui lòng nhập mật khẩu';
            } else if (strlen($filterAll['password']) < 8) {
                $errors['password']['length'] = 'Mật khẩu phải lớn hơn 8 ký tự';
            }
            //validate password_confirm
            if (empty($filterAll['password_confirm'])) {
                $errors['password_confirm']['require'] = 'Vui lòng nhập lại mật khẩu';
            } else if ($filterAll['password_confirm'] != $filterAll['password']) {
                $errors['password_confirm']['match'] = 'Mật khẩu không khớp';
            }
            if (empty($errors)) {
                // update password
                $passwordHash = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                $dataUpdate = [
                    'password' => $passwordHash,
                    'forgotToken' => null,
                    'update_at' => date('Y-m-d H:i:s'),
                ];
                $where = [
                    'id' => $tokenQuery['id']
                ];
                $updateStatus = update('users', $dataUpdate, http_build_query($where));
                if ($updateStatus) {
                    setFlashData('msg', "Đặt lại mật khẩu thành công. Vui lòng đăng nhập lại!");
                    setFlashData('msg_type', 'success');
                    redirect("?module=auth&action=login");
                } else {
                    setFlashData('msg', "Đặt lại mật khẩu thất bại. Vui lòng thử lại!");
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', "Đăng ký thất bại. Vui lòng kiểm tra lại thông tin!!!");
                setFlashData('msg_type', 'danger');
                setFlashData('errors', $errors);
            }
            redirect("?module=auth&action=reset&token=$token");
        }
        $msg = getFlashData('msg');
        $msg_type = getFlashData('msg_type');
        $errors = getFlashData('errors');
        ?>
        <!-- form reset -->
        <div class='col-4' style="margin: 50px auto;">
            <h2 class="text-center text-uppercase">Đặt lại mật khẩu</h2>

            <form action="" method="POST">
                <div class="form-group mg-form">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                    <?php
                    formError('password', '<span class="error">', '</span>', $errors);
                    ?>
                </div>
                <div class="form-group mg-form">
                    <label for="">Nhập lại Password</label>
                    <input name="password_confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                    <?php
                    formError('password_confirm', '<span class="error">', '</span>', $errors);
                    ?>
                </div>
                <input type="hidden" name="token" value="<?php echo $token ?>">
                <button type="submit" class="mg-btn btn btn-primary btn-block">Gửi</button>
                <hr>
                <p class="text-center">Bạn đã có tài khoản? <a href="?module=auth&action=login">Đăng nhập</a></p>
            </form>
        </div>
        <?php
    } else {
        getMsg('Liên kết đã hết hạn hoặc không tồn tại vui lòng thử lại!', 'danger');

    }
} else {
    getMsg('Liên kết không đúng!', 'danger');
}
$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$errors = getFlashData('errors');
?>

<?php
layout('footer-login');
?>