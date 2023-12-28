<?php
// bieu dien vong lap for bang while

$i = 1;
while ($i <= 10) {
  echo $i . '<br/>';
  $i++;
}

// tinh tong  s = 1 + 2 + 3 + ... + n

$n = 10;
$i = 1;
$total = 0;

while ($i <= $n) {
  $total += $i;
  $i++;
}
echo $total . ' <br/>';