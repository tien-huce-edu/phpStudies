<?php
require_once 'connect.php';
$sql = "select * from sinhvien";

try {
  $stmt = $conn->prepare($sql);
  $selectStatus = $stmt->execute();

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<pre>';
  print_r($data);
  echo '</pre>';
} catch (Exception $e) {
  echo $e->getMessage() . '<br/>';
  echo 'File: ' . $e->getFile() . '<br/>';
  echo 'Line: ' . $e->getLine() . '<br/>';
}

// truy van 1 dong du lieu
require_once 'connect.php';
$sql = "select * from sinhvien where id = :id";

$id = 10;
try {
  $stmt = $conn->prepare($sql);

  $data = [
    'id' => $id
  ];
  $selectStatus = $stmt->execute($data);

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<pre>';
  print_r($data);
  echo '</pre>';
} catch (Exception $e) {
  echo $e->getMessage() . '<br/>';
  echo 'File: ' . $e->getFile() . '<br/>';
  echo 'Line: ' . $e->getLine() . '<br/>';
}
?>