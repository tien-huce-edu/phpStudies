<!-- xay dung trang dang nhap -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
$data = [
    'pageTitle' => 'Đăng nhập tài khoản'
];
layout('header', $data);


if (isLogin()) {
    redirect('?module=home&action=dashboard');
}

if (isPost()) {
    $errors = [];
    $filterAll = filter();
    // validate email
    if (!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password']))) {
        // check login 
        $email = $filterAll['email'];
        $password = $filterAll['password'];

        $userQuery = getOneRaw("SELECT password, id, activeToken FROM users WHERE email = '$email'");

        if (!empty($userQuery)) {
            $passwordHash = $userQuery['password'];
            $userId = $userQuery['id'];
            $token = $userQuery['activeToken'];
            if (empty($token)) {
                if (password_verify($password, $passwordHash)) {
                    // tạo token login 
                    $tokenLogin = sha1(uniqid() . time());

                    //insert vao bang
                    $dataInsert = [
                        'user_Id' => $userId,
                        'token' => $tokenLogin,
                        'created_at' => date('y-m-d H:i:s')
                    ];

                    $insertStatus = insert('tokenlogin', $dataInsert);
                    if ($insertStatus) {

                        setSession('loginToken', $tokenLogin);

                        redirect('?module=home&action=dashboard');
                    } else {
                        setFlashData('msg', 'Không thể đăng nhập vui lòng thử lại');
                        setFlashData('msg_type', 'danger');
                    }


                } else {
                    setFlashData('msg', 'Mật khẩu không chính xác!');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Vui lòng kiểm tra email và xác thực tài khoản!');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tồn tại!');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng nhập email và mật khẩu');
        setFlashData('msg_type', 'danger');
    }
    redirect('?module=auth&action=login');
}


$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
?>

<div class="row">
    <div class='col-4' style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng nhập quản lý user</h2>
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
            <div class="form-group mg-form">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Mat khau">

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