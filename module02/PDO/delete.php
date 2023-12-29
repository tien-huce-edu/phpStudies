<?php
require_once 'connect.php';
$sql = "delete from sinhvien where id = :id";

$id = 12;

try {
  $statement = $conn->prepare($sql);

  $data = [
    'id' => $id
  ];
  $deleteStatus = $statement->execute($data);
  var_dump($deleteStatus);
} catch (Exception $e) {
  echo $e->getMessage() . '<br/>';
  echo 'File: ' . $e->getFile() . '<br/>';
  echo 'Line: ' . $e->getLine() . '<br/>';
}
?>