<?php
// connect to database
const _HOST_NAME = 'localhost';
const _DATABASE_NAME = 'tienhg2001';
const _DATABASE_USER_NAME = 'root';
const _DATABASE_PASSWORD = '';

try {
  if (class_exists('PDO')) {
    $dsn = 'mysql:dbname=' . _DATABASE_NAME . ';host=' . _HOST_NAME;
    $options = [
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $conn = new PDO($dsn, _DATABASE_USER_NAME, _DATABASE_PASSWORD, $options);
    if ($conn) {
      echo '<p style="color:green">';
      echo 'Connected to the ' . _DATABASE_NAME . ' database successfully!';
      echo '</p>';
    }
  }
} catch (Exception $exeption) {
  echo '<div style="color:red;padding:5px 15px; border: 1px solid red">';
  echo $exeption->getMessage() . '<br/>';
  echo '</div>';
  die();
}


?>