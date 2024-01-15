<!-- ket noi db -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

$databaseInfo = [
    'host' => $_ENV['MYSQL_HOST_NAME'],
    'name' => $_ENV['MYSQL_DATABASE_NAME'],
    'user' => $_ENV['MYSQL_USER'],
    'pass' => $_ENV['MYSQL_PASSWORD']
];
// connect to database
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . $databaseInfo['name'] . ';host=' . $databaseInfo['host'];
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $conn = new PDO($dsn, $databaseInfo['user'], $databaseInfo['pass'], $options);
        if (!$conn) {
            die('Could not connect to MySQL');
        }
    }
} catch (Exception $exeption) {
    echo '<div style="color:red;padding:5px 15px; border: 1px solid red">';
    echo $exeption->getMessage() . '<br/>';
    echo '</div>';
    die();
}

?>