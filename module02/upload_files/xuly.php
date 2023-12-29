<?php
if (!empty($_SERVER['REQUEST_METHOD'])) {
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";
}
?>


<?php
$result = move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);

var_dump($result);
?>