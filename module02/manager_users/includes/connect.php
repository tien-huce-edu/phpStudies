<!-- ket noi db -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}
?>

<?php
// connect to database
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DATABASE_NAME . ';host=' . _HOST_NAME;
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $conn = new PDO($dsn, _DATABASE_USER_NAME, _DATABASE_PASSWORD, $options);
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