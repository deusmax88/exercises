<?php
// Найти количество способов записать произвольное число N
// как сумму чисел 1, 3, 4

$n = $argv[1];
$dp = [1, 1, 1, 2];
for( $i = 4; $i <= $n; $i++) {
    $dp[$i] = $dp[$i - 1] + $dp[$i - 3] + $dp[$i - 4];
}

echo $dp[$n]."\n";

function numOfMethods($n)
{
    if ($n <= 2) {
        return 1;
    }

    if ($n == 3) {
        return 2;
    }

    return numOfMethods($n - 1) + numOfMethods($n - 3) + numOfMethods($n - 4);
}

echo numOfMethods($n);

