<?php

$number = 6;
$check = $number % 2 === 0;
if ($check) {
  echo $number . ' is even number';
}
echo '<br/>';

/*
Nếu số < 0 => số âm 
nếu số = 0 => số không
nếu số > 0 và <= 5 => số bé
nếu số > 5 và <= 10 => số trung bình
nếu số > 10  => số lớn
*/

$number = 20;

// dung if elseif

if ($number < 0) {
  echo $number . ' is negative number';
} elseif ($number === 0) {
  echo $number . ' is zero';
} elseif ($number > 0 && $number <= 5) {
  echo $number . ' is small number';
} elseif ($number > 5 && $number <= 10) {
  echo $number . ' is medium number';
} else {
  echo $number . ' is large number';
}
echo '<br/>';

// dùng if lồng nhau

if ($number >= 0) {
  if ($number > 0) {
    if ($number <= 10) {
      if ($number <= 5) {
        echo $number . ' is small number';
      } else {
        echo $number . ' is medium number';
      }
    } else {
      echo $number . ' is large number';
    }
  }
} else {
  echo $number . ' is negative number';
}