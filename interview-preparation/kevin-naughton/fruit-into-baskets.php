<?php
// Originally viewed on https://www.youtube.com/watch?v=za2YuucS0tw&t=76s

$a = [1, 2, 1];
// Expected output is 3 - so we could collect 2 fruit of type 1 and 1 fruit of type 2

$b = [0, 1, 2, 2];
// Expected output is also 3

$c = [1, 2, 3, 2, 2];
// Expected output is 4

$a = $c;

$max = 1;
$map = [];
$i = 0;
$j = 0;
while ($j < count($a)) {
    if (count($map) <= 2) {
        $map[$a[$j]] = $j++;
    }

    if (count($map) > 2) {
        $min = count($a) - 1;
        foreach($map as $val) {
            $min = min($min, $val);
        }
        $i = $min + 1;
        unset($map[$a[$min]]);
    }

    $max = max($max, $j - $i);
}

var_dump($max);
