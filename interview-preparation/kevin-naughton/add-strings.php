<?php
// Originally viewed on https://www.youtube.com/watch?v=_Qp-CTzat50&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=48&pbjreload=101
// Unfortunately seems that i am wrong at understanding the problem

$num1 = "111";
$num2 = "111";

$num11 = 0;
for($i = mb_strlen($num1) - 1; $i >= 0 ; $i--) {
    $c = mb_substr($num1, $i ,1);
    $num11 += $c * pow(10 , (mb_strlen($num1) - $i - 1));
}
$num12 = 0;
for($i = mb_strlen($num2) - 1; $i >= 0 ; $i--) {
    $c = mb_substr($num2, $i ,1);
    $num12 += $c * pow(10 , (mb_strlen($num2) - $i - 1));
}

var_dump($num11 + $num12);

// So this is solution according to Kevin Videos
$i = mb_strlen($num1) - 1;
$j = mb_strlen($num2) - 1;
$carry = 0;
$result = [];
while ($i >= 0 || $j >= 0) {
    $sum = $carry;
    if ($i >= 0) {
        $sum += mb_ord(mb_substr($num1, $i-- , 1)) - mb_ord('0');
    }
    if ($j >= 0) {
        $sum += mb_ord(mb_substr($num2, $j--, 1)) - mb_ord('0');
    }

    $result[] = $sum % 10;
    $carry = intdiv($sum, 10);
}

if ($carry) {
    $result[] = $carry;
}

var_dump(join('', array_reverse($result)));