<!-- 
  validate client: html, js
  validate server: php

  Bắt lỗi:
  Họ tên -> bắt buộc và lớn hơn 5 ký tự
  Email -> bắt buộc, đúng định dạng

 -->

<?php
if (!empty($_POST)) {
  $errors = [];
  // lỗi fullname
  if (empty($_POST['fullname'])) {
    $errors['fullname']['required'] = 'Bắt buộc nhập họ tên';
  } else {
    if (strlen($_POST['fullname']) < 5) {
      $errors['fullname']['min_length'] = 'Họ tên phải lớn hơn 5 ký tự';
    }
  }
  // lỗi email 
  if (empty($_POST['email'])) {
    $errors['email']['required'] = 'Bắt buộc nhập email';
  } else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email']['invalid'] = 'Email không đúng định dạng';
    }
  }
  if (empty($errors)) {
    echo "Hello, " . $_POST['fullname'] . " - " . $_POST['email'];
  } else {
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
  }
}
?>

<form method="post" action="">
  <p>
    Tên:
    <input type="text" name="fullname" placeholder="Enter your name">
    <?php
    echo !empty($errors['fullname']['required']) ? '<p style="color:red">' . $errors['fullname']['required'] . '</p>' : '';
    ?>
    <?php
    echo !empty($errors['fullname']['min_length']) ? '<p style="color:red">' . $errors['fullname']['min_length'] . '</p>' : '';
    ?>
  </p>
  <p>
    Email:
    <input type="text" name="email" placeholder="Enter your email">
    <?php
    echo !empty($errors['email']['required']) ? '<p style="color:red">' . $errors['email']['required'] . '</p>' : '';
    ?>
    <?php
    echo !empty($errors['email']['invalid']) ? '<p style="color:red">' . $errors['email']['invalid'] . '</p>' : '';
    ?>
  </p>

  <button type="submit" value="Submit">Gửi</button>
</form>