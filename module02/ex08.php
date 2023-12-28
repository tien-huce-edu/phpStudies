<?php
$number = 10;

/* 
Thang co 30 ngay: 4, 6, 9, 11
Thang co 31 ngay: 1, 3, 5, 7, 8, 10, 12
Thang co 28 hoac 29 ngay: 2 (nam nhuan)

*/

$month = 3;
$year = 2022;

switch ($month) {
  case 2:
    if ($year % 4 === 0) {
      echo "Thang $month co 29 ngay";
      return;
    }
    echo "Thang $month co 28 ngay";
    break;

  case 4:
  case 6:
  case 9:
  case 11:
    echo "Thang $month co 30 ngay";
    break;

  default:
    echo "Thang $month co 31 ngay";
    break;
}
