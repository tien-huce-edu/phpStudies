<?php

require_once 'connect.php';

$sql = "insert into sinhvien(name, id_subject, age) values (:name, :id_subject, :age)";

try {
  $statement = $conn->prepare($sql);

  $fullname = 'Nguyễn Văn A';
  $id_subject = 1;
  $age = 22;
  $data = [
    'name' => $fullname,
    'id_subject' => $id_subject,
    'age' => $age
  ];
  $insertStatus = $statement->execute($data);

  var_dump($insertStatus);
} catch (Exception $e) {
  echo $e->getMessage() . '<br/>';
  echo 'File: ' . $e->getFile() . '<br/>';
  echo 'Line: ' . $e->getLine() . '<br/>';
}