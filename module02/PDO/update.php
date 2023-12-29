<?php
require_once 'connect.php';

$sql = "update sinhvien set name = :name, age = :age where id = :id";

$fullname = 'Nguyễn Văn Tiến';
$age = 18;
$id = 11;

try {
  $statement = $conn->prepare($sql);

  $data = [
    'name' => $fullname,
    'age' => $age,
    'id' => $id
  ];
  $updateStatus = $statement->execute($data);
  var_dump($updateStatus);
} catch (Exception $e) {
  echo $e->getMessage() . '<br/>';
  echo 'File: ' . $e->getFile() . '<br/>';
  echo 'Line: ' . $e->getLine() . '<br/>';
}
?>