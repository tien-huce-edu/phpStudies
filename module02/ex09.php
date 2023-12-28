<?php

// $count = 10;

// for ($i = 1; $i <= 10; $i++) {
//   echo "$i <br/>";
// }

// // vi du 1: Tinh tong s cac so tu 1 den n

// $n = 100;
// $s = 0;

// for ($i = 1; $i <= $n; $i++) {
//   $s += $i;
// }
// echo "Tong cac so tu 1 den $n la: $s <br/>";

// $resultEven = null;
// $resultOdd = null;

// $evenCount = 0;
// $oddCount = 0;
// for ($i = 1; $i <= $n; $i++) {
//   if ($i % 2 === 0) {
//     $resultEven .= $i . ' ';
//     $evenCount++;
//   } else {
//     $resultOdd .= $i . ' ';
//     $oddCount++;

//   }
// }
// echo "<b>$evenCount</b> chan tu 1 den $n la: $resultEven <br/>";
// echo "<b>$oddCount</b> le tu 1 den $n la: $resultOdd <br/>";


// // kiem tra so n co phai la so nguyen to

// $check = 100;
// $isPrime = true;

// if ($check < 2) {
//   $isPrime = false;
// } else {
//   for ($i = 2; $i <= $check; $i++) {
//     if ($check % $i === 0) {
//       $isPrime = false;
//       return;
//     }
//   }
// }
// echo $isPrime ? "$check la so nguyen to" : "$check khong phai la so nguyen to";

?>

<!-- <table border="1" width="100%">

  <?php
  for ($i = 1; $i <= 10; $i++) {
    if ($i === 1 || $i === 6) {
      echo '<tr>';
    }
    echo '<td>';
    for ($j = 1; $j <= 10; $j++) {
      echo "$i x $j = " . $i * $j . '<br/>';
    }
    echo '</td>';
    if ($i === 5 || $i === 10) {
      echo '</tr>';
    }
  }
  ?>



</table> -->

<table width="800px" height="800px" border="1" cellpadding="0" cellspacing="0">
  <?php
  for ($i = 1; $i <= 8; $i++) {
    echo '<tr>';
    if ($i % 2 === 0) {
      for ($j = 1; $j <= 8; $j++) {
        if ($j % 2 === 0) {
          echo '<td style="background: #000" width="100px" height="100px"></td>';
        } else {
          echo '<td style="background: #fff" width="100px" height="100px"></td>';
        }
      }
    } else {
      for ($j = 1; $j <= 8; $j++) {
        if ($j % 2 === 0) {
          echo '<td style="background: #fff" width="100px" height="100px"></td>';
        } else {
          echo '<td style="background: #000" width="100px" height="100px"></td>';
        }
      }
    }
    echo '</tr>';
  }
  ?>
</table>