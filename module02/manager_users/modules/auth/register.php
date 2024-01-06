<!-- dang ky -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
$data = [
    'pageTitle' => 'Đăng ký tài khoản'
];

layout('header-login', $data);

if (isPost()) {
    $filterAll = filter();
    $errors = [];
    // validate fullname
    if (empty($filterAll['fullname'])) {
        $errors['fullname']['require'] = 'Vui lòng nhập họ tên';
    } else {
        if (strlen($filterAll['fullname']) < 6) {
            $errors['fullname']['length'] = 'Họ tên phải lớn hơn 6 ký tự';
        }
    }
    // validate email
    if (empty($filterAll['email'])) {
        $errors['email']['require'] = 'Vui lòng nhập email';
    } else if (!isEmail($filterAll['email'])) {
        $errors['email']['format'] = 'Email không đúng định dạng';
    } else {
        $email = $filterAll['email'];
        $sql = "select id from users where email = '$email'";
        if (getOneRaw($sql) > 0) {
            $errors['email']['exist'] = 'Email đã tồn tại';
        }
    }
    //validate phone
    if (empty($filterAll['phone'])) {
        $errors['phone']['require'] = 'Vui lòng nhập số điện thoại';
    } else if (!isPhone($filterAll['phone'])) {
        $errors['phone']['format'] = 'Số điện thoại không đúng định dạng';
    }
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
        $activeToken = sha1(uniqid() . time());
        $dataInsert = [
            'fullname' => $filterAll['fullname'],
            'email' => $filterAll['email'],
            'phone' => $filterAll['phone'],
            'password' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
            'activeToken' => $activeToken,
            'create_at' => date('Y-m-d H:i:s'),
        ];

        $insertStatus = insert('users', $dataInsert);
        if ($insertStatus) {


            // tạo link kích hoạt
            $linkActive = _WEB_HOST . '?module=auth&action=active&token=' . $activeToken;
            // send mail
            $subject = '[' . $filterAll['email'] . ' - ' . 'xác nhận đăng ký tài khoản' . ']';
            $content = '<p>Chào ' . $filterAll['fullname'] . '</p>';
            $content .= '<p>Bạn đã đăng ký tài khoản thành công. Vui lòng click vào link bên dưới để kích hoạt tài khoản.</p>';
            $content .= $linkActive;
            $content .= '<br/>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.';

            // gui mail
            $sendMail = sendMail($filterAll['email'], $subject, $content);
            if ($sendMail) {
                setFlashData('msg', "Đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản. 😂😂😂");
                setFlashData('msg_type', "success");
            } else {
                setFlashData('msg', "Hệ thống đang gặp sự cố vui lòng thử lại sau. 😂😂😂");
                setFlashData('msg_type', "danger");
            }
        } else {
            setFlashData('msg', "Đăng ký không thành công. 😂😂😂");
            setFlashData('msg_type', "danger");
        }

        redirect("?module=auth&action=login");
    } else {
        setFlashData('msg', "Đăng ký thất bại. Vui lòng kiểm tra lại thông tin!!!");
        setFlashData('msg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        redirect("?module=auth&action=register");
    }
}


$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
?>

<div class="row">
    <div class='col-4' style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng ký quản lý user</h2>

        <?php
        if (!empty($msg)) {
            getMsg($msg, $msg_type);
        }
        ?>
        <form action="" method="POST">
            <div class="form-group mg-form">
                <label for="">Họ tên</label>
                <input name="fullname" type="text" class="form-control" placeholder="Họ và tên"
                    value="<?php old('fullname', $old, 'Nguyen Van Tien'); ?>">
                <?php
                formError('fullname', '<span class="error">', '</span>', $errors);
                ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email"
                    value="<?php old('email', $old, 'tienhg1310@gmail.com'); ?>">
                <?php
                formError('email', '<span class="error">', '</span>', $errors);
                ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Số điện thoại</label>
                <input name="phone" type="number" class="form-control" placeholder="Số điện thoại"
                    value="<?php old('phone', $old, '0869318118'); ?>">
                <?php
                formError('phone', '<span class="error">', '</span>', $errors);
                ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu"
                    value="<?php old('password', $old, '123123123'); ?>">
                <?php
                formError('password', '<span class="error">', '</span>', $errors);
                ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Nhập lại Password</label>
                <input name="password_confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                    value="<?php old('password_confirm', $old, '123123123'); ?>">
                <?php
                formError('password_confirm', '<span class="error">', '</span>', $errors);
                ?>
            </div>
            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng ký</button>
            <hr>
            <p class="text-center">Bạn đã có tài khoản? <a href="?module=auth&action=login">Đăng nhập</a></p>
        </form>
    </div>
</div>

<?php
layout('footer-login');
?>