<?php

$str = 'Hello world!!!';

// chuyen chuoi thanh mang
$arr = explode(' ', $str);
print_r($arr);
echo '<br/>';
// chuyen mang thanh chuoi
$str1 = implode(' ', $arr);
print_r($str1);
echo '<br/>';
// lay do dai cua chuoi 
$length = strlen($str);
echo "$str co do dai: " . $length . '<br/>';
// word count 
$wordCount = str_word_count($str);
echo "$str co $wordCount tu <br/>";

// lap chuoi theo so lan xac dinh
$str2 = str_repeat("$str ", 10);
echo $str2 . '<br/>';

// ham tim kiem va thay the
$str4 = "http://localhost:8080/php-training/module02/string/ex02.php";
$str3 = str_replace('/', '\\', $str4);
echo $str3 . '<br/>';

// ham ma hoa 1 chieu md5
$str5 = 'tienhg2001';
$str5 = md5($str5);

// ham ma hoa 1 chieu sha
$str6 = 'tienhg2001';
$str6 = sha1($str6);
echo $str6 . '<br/>';
echo strlen($str6) . '<br/>';

// chuyen huoi html thanh dang thuc the
$str = '<p>Tienhg2001</p>';
$str = htmlentities($str);
echo $str . '<br/>';

// chuyen thuc the html sang chuoi 
$str = html_entity_decode($str);
echo $str . '<br/>';

// loai bo the html 
$str = '<p><a href="">Tienhg2001</a></p>';
$str = strip_tags($str, '<a>');
echo $str . '<br/>';

// lay chuoi con tu chuoi cha
$str = 'http://localhost:8080/php-training/module02/string/ex02.php';
$subStr = substr($str, 0, 22);
$subStr1 = substr($str, -10);
echo $subStr . '<br/>';
echo $subStr1 . '<br/>';

// tach chuoi tu ky tu cho truoc toi het chuoi
$str = 'http://localhost:8080/php-training/module02/string/ex02.php';
$subStr = strstr($str, 'localhost');
echo $subStr . '<br/>';

// tim chuoi tra ve so thu tu bat dau chuoi do
$str = 'http://localhost:8080/php-training/module02/string/ex02.php';
$subStr = strpos($str, 'localhost');
echo $subStr . '<br/>';

// cat bo 1 doan chuoi thay the bang 1 doan chuoi khac
$str = 'http://localhost:8080/php-training/module02/string/ex02.php';
$add_str = 'https';
$str = substr_replace($str, $add_str, 0, strlen($add_str));
echo $str . '<br/>';

// to lower case 
$str = 'Tiến Hát Gờ';
$str = strtolower($str);
// $str = mb_strtolower($str, 'UTF-8');
echo $str . '<br/>';

// to upper case
$str = 'Tiến Hát Gờ';
// $str = strtoupper($str);
$str = mb_strtoupper($str, 'UTF-8');
echo $str . '<br/>';

// viet hoa chu cai dau tien
$str = 'tiến hát gờ';
$str = ucfirst($str);
echo $str . '<br/>';

// viet hoa chu cai dau tien cua tat ca cac tu
$str = 'tiến hát gờ';
$str = ucwords($str);
echo $str . '<br/>';

// xoa ky tu dau cuoi
$str = '  tiến hát gờ   ';
$str = trim($str);
var_dump($str);