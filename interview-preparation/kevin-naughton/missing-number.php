<?php
// Originally viewed on https://www.youtube.com/watch?v=YMYVYSWL93w&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=6&t=0s

$a = [3,0,1];
// Expected output 2
// So we could use Gaussian law - sum of distinct natural numbers
$m = count($a) + 1;
$sum = 0;
while (($n = array_shift($a)) !== null) {
    $sum += $n;
}

var_dump(($m *($m - 1)/2) - $sum);